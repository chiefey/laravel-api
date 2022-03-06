<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ControllerMakeCommand extends \Illuminate\Routing\Console\ControllerMakeCommand
{
    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     */
    protected function buildClass($name)
    {
        $controllerNamespace = $this->getNamespace($name);

        $replace = [];

        $replace['{{ version }}'] = Str::lower(Str::afterLast($controllerNamespace, '\\'));

        $modelName = $this->option('model');
        $modelClass = $this->qualifyModel($modelName);
        $model = new $modelClass;
        $columns = collect(DB::select('describe ' . $model->getTable()))->pluck('Field');

        $filtered = $columns->filter(function ($value) use ($model) {
            return in_array($value, $model->getFillable());
        });

        $required = $filtered->map(function ($item) {
            return '"' . Str::camel($item) . '"';
        })->implode(',');

        $properties = $filtered->map(function ($item) use ($modelName) {
            return "     *              @OA\Property(
     *                  property=\"" . Str::camel($item) . "\",
     *                  ref=\"#/components/schemas/$modelName/properties/" . Str::camel($item) . "\"
     *              )";
        })->implode(",\n");

        $replace['{{ postRequired }}'] = $required;
        $replace['{{ postProperties }}'] = $properties;

        return str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );
    }

    /**
     * Build the model replacement values.
     *
     * @param  array  $replace
     * @return array
     */
    protected function buildModelReplacements(array $replace)
    {
        $modelClass = $this->parseModel($this->option('model'));

        return array_merge(parent::buildModelReplacements($replace), [
            '{{ modelSnake }}' => Str::snake(class_basename($modelClass)),
            '{{ modelUpperSnake }}' => Str::upper(Str::snake(class_basename($modelClass))),
            '{{ modelKebab }}' => Str::kebab(class_basename($modelClass)),
            '{{ modelCamel }}' => Str::camel(class_basename($modelClass))
        ]);
    }
}
