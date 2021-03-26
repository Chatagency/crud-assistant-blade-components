<?php

namespace Chatagency\CrudAssistantBladeComponents;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class CrudAssistantBladeComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $helper = CrudAssistantBladeComponents::make();

        $this->loadViewsFrom(__DIR__.'/../resources/views', $helper->getNamespace());

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/crud-assistant-blade-components.php' => config_path('crud-assistant-blade-components.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/crud-assistant-blade-components'),
            ], 'views');
        }
        
        $this->registerBladeDirectives($helper);

    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/crud-assistant-blade-components.php', 'crud-assistant-blade-components');

        // Register the main class to use with the facade
        $this->app->bind('crud-assistant-blade-components', function () {
            return new CrudAssistantBladeComponents;
        });

        include_once('helpers.php');
    }

    public function registerBladeDirectives($helper)
    {
        Blade::directive('caComponent', function ($expression) use ($helper) {
            
            $parsed = $helper->parse($expression);
            $component = $parsed['component'];
            $params = $parsed['params'] ??  null;
            $path = $helper->rawComponent($component);

            return "<?php echo view({$path}, {$params})->render(); ?>";
        });

        Blade::directive('caInput', function ($expression) use ($helper) {
            
            $parsed = $helper->parse($expression);
            $component = $parsed['component'];
            $params = $parsed['params'] ??  null;
            $path = $helper->rawInput($component);
            
            return "<?php echo view({$path}, ['input' => {$params}])->render(); ?>";
        });
    }
}
