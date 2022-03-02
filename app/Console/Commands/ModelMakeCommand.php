<?php

namespace App\Console\Commands;

use Illuminate\Database\Schema\ColumnDefinition;
use Illuminate\Foundation\Console\ModelMakeCommand as IlluminateModelMakeCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;

class ModelMakeCommand extends IlluminateModelMakeCommand
{
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->option('swagger')
            ? $this->resolveStubPath('/stubs/model.swagger.stub')
            : parent::getStub();
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $this->definition = json_decode($this->option('definition'), true);

        if($this->definition) {
            $attributes = [];
            foreach ($this->definition['attributes'] as $attribute) {
                $attributes[] = new ColumnDefinition($attribute);
            }
            $this->definition['attributes'] = collect($attributes);
        }

        $replace = $this->buildSwaggerReplacements();

        $replace = $this->buildPropertyReplacements($replace);

        $replace = $this->buildFillableReplacements($replace);

        $replace = $this->buildHiddenReplacements($replace);

        $replace = $this->buildCastsReplacements($replace);

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }

    /**
     * Build the swagger replacement values.
     *
     * @param  array  $replace
     * @return array
     */
    protected function buildSwaggerReplacements()
    {
        $required = '';
        if(!empty($this->definition['required'])){
            $required = implode(',', array_map(function ($item) {
                return '"' . Str::camel($item) . '"';
            }, $this->definition['required']));
        }

        return [
            '{{ schemaRequired }}' => $required
        ];
    }

    /**
     * Replace the swagger properties for the given stub.
     *
     * @param  array  $replace
     * @return string
     */
    protected function buildPropertyReplacements(array $replace)
    {
        $properties = '';
        if(!empty($this->definition['attributes'])){
            $properties = $this->definition['attributes']->map(function ($item) {
                $type = 'integer';
                if ($item->get('type') == 'string') {
                    $type = 'string';
                } else if ($item->get('type') == 'timestamp') {
                    $type = '\DateTime';
                }
                return "    /**
     * @OA\Property(
     *      property=\"" . Str::camel($item->get('name')) . "\",
     *      title=\"{$item->get('name')}\",
     *      description=\"{$item->get('name')}\"
     * )
     *
     * @var $type
     */";
            })->implode("\n\n");
        }

        return array_merge($replace, [
            '{{ swaggerProperties }}' => $properties
        ]);
    }

    /**
     * Replace the fillable for the given stub.
     *
     * @param  array  $replace
     * @return $this
     */
    protected function buildFillableReplacements(array $replace)
    {
        $fillable = '';
        if(!empty($this->definition['fillable'])){
            $fillable = collect($this->definition['fillable'])->map(function ($item) {
                return "'$item'";
            })->implode(",\n        ");
        }

        return array_merge($replace, [
            '{{ fillable }}' => $fillable
        ]);
    }

    /**
     * Replace the hidden for the given stub.
     *
     * @param  array  $replace
     * @return $this
     */
    protected function buildHiddenReplacements(array $replace)
    {
        $hidden = '';
        if(!empty($this->definition['hidden'])){
            $hidden = collect($this->definition['hidden'])->map(function ($item) {
                return "'$item'";
            })->implode(",\n        ");
        }

        return array_merge($replace, [
            '{{ hidden }}' => $hidden
        ]);
    }

    /**
     * Replace the casts for the given stub.
     *
     * @param  array  $replace
     * @return $this
     */
    protected function buildCastsReplacements(array $replace)
    {
        $casts = '';
        if(!empty($this->definition['casts'])){
            $casts = collect($this->definition['casts'])->map(function ($item, $key) {
                return "'$key' => '$item'";
            })->implode(",\n        ");
        }

        return array_merge($replace, [
            '{{ casts }}' => $casts
        ]);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array_merge(parent::getOptions(), [
            ['swagger', null, InputOption::VALUE_NONE, 'Indicates if the generated model should be a swagger model'],
            ['required', null, InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY, 'Indicates the required attributes of the generated model'],
            ['definition', null, InputOption::VALUE_REQUIRED, 'Indicates the definition of the generated model']
        ]);
    }
}
