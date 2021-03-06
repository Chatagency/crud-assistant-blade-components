<?php

namespace Chatagency\CrudAssistantBladeComponents\Tests;

use Chatagency\CrudAssistantBladeComponents\CrudAssistantBladeComponentsServiceProvider;

class CrudAssistantBladeComponentsTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [CrudAssistantBladeComponentsServiceProvider::class];
    }
    
    /** @test */
    public function a_directive_can_be_used_to_include_a_component()
    {
        $path =  CACHelper()->component('table');

        $params = '[
            "head" => [],
            "body" => [],
            "pagination" => null,
            "count" => 0,
        ]';

        $component = $this->blade->compileString('@caComponent("table", '.$params .')');

        $this->assertStringContainsString($path, $component);
    }

    /** @test */
    public function a_directive_can_be_used_to_include_an_input()
    {
        $path =  CACHelper()->input('text');

        $params = 'new DataContainer([
            "name" => "name",
            "label" => "Name",
            "type" => "text",
            "title" => null,
            "helpText" => "Enter your name",
            "invalidFeedback" => null,
            "labelAttributes" => [],
            "extra" => [],
            "attributes" => [],
            "value" => "Margaret Garcia",
            "error" => null,
        ])';

        $component = $this->blade->compileString('@caInput("text", '.$params.')');

        $this->assertStringContainsString($path, $component);
    }
}
