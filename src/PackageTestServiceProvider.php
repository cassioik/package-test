<?php

namespace Cassioik\PackageTest;

use Illuminate\Support\ServiceProvider;

class PackageTestServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'cassioik');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'cassioik');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/package-test.php', 'package-test');

        // Register the service the package provides.
        $this->app->singleton('package-test', function ($app) {
            return new PackageTest;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['package-test'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/package-test.php' => config_path('package-test.php'),
        ], 'package-test.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/cassioik'),
        ], 'package-test.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/cassioik'),
        ], 'package-test.assets');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/cassioik'),
        ], 'package-test.lang');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
