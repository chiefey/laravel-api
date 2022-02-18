<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as IlluminateModelMakeCommand;
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
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array_merge(parent::getOptions(), [
            ['swagger', null, InputOption::VALUE_NONE, 'Indicates if the generated model should be a swagger model']
        ]);
    }
}
