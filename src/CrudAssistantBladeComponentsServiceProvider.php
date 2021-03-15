<?php

namespace Chatagency\CrudAssistantBladeComponents;

use Illuminate\Support\ServiceProvider;

class CrudAssistantBladeComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'crud-assistant-blade-components');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('crud-assistant-blade-components.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/crud-assistant-blade-components'),
            ], 'views');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'crud-assistant-blade-components');

        // Register the main class to use with the facade
        $this->app->singleton('crud-assistant-blade-components', function () {
            return new CrudAssistantBladeComponents;
        });
    }
}
