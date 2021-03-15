<?php

namespace Chatagency\CrudAssistantBladeComponents\Tests;

use Orchestra\Testbench\TestCase;
use Chatagency\CrudAssistantBladeComponents\CrudAssistantBladeComponentsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CrudAssistantBladeComponentsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
