<?php

namespace Chatagency\CrudAssistantBladeComponents\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * https://github.com/appstract/laravel-blade-directives/blob/master/tests/TestCase.php
 */
class TestCase extends BaseTestCase
{
    protected $blade;

    public function setUp(): void
    {
        parent::setUp();

        $this->blade = app('blade.compiler');
    }

    protected function assertDirectiveOutput($expected, $expression, $variables = [], $message = '')
    {
        $compiled = $this->blade->compileString($expression);

        ob_start();
        extract($variables);
        eval(' ?>'.$compiled.'<?php ');

        $output = ob_get_clean();

        $this->assertSame($expected, $output, $message);
    }
}
