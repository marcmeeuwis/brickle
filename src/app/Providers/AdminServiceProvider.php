<?php

namespace Doitonlinemedia\Admin\App\Providers;

use Doitonlinemedia\Admin\App\Http\Kernel;
use Illuminate\Support\ServiceProvider;
class AdminServiceProvider extends ServiceProvider
{
    protected $moduleServiceProvider;

    private $publishPath = 'vendor/doitonlinemedia/admin';

    /**
     * AdminServiceProvider constructor.
     * @param \Illuminate\Contracts\Foundation\Application $app
     */
    public function __construct(\Illuminate\Contracts\Foundation\Application $app)
    {
        parent::__construct($app);
        
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Load some helper functions
        require_once __DIR__.'/../Helpers/helpers.php';

        config(['auth.providers.users.model' => \Doitonlinemedia\Admin\App\Models\User::class]);

        // Register package middleware
        new Kernel($this->app, $this->app['router']);

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', 'admin');

        // Load package routes
        $this->routes();

        // Load package views
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'admin');

        // Publish what needs to be published
        $this->publish();

        // Load all ServiceProviders that are needed
        $providers = collect(config('admin.providers'));
        $providers->each(function($value) {
            app()->register($value);
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();

        // Load config before publish. And load all aliases.
        $config = require __DIR__.'/../../config/admin.php';
        $aliases = collect($config['aliases']);
        $aliases->each(function($value, $key) use($loader) {
            $loader->alias($key, $value);
        });
    }

    /**
     * Load package routes and custom module routes
     * Module should contain a BackendRoutes.php and also a FrontendRoutes.php
     */
    private function routes()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/../Http/routes.php';
        }
    }

    /**
     * These files and folders should be published in the application for custom modifications.
     */
    private function publish()
    {
        $this->publishes([
            __DIR__.'/../../config/admin.php' => config_path('admin.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../../resources/assets' => public_path($this->publishPath),
        ], 'public');


//        $this->publishes([
//            __DIR__.'/../../database/' => database_path()
//        ], 'database');

        $this->publishes([
            __DIR__.'/../../resources/views' => resource_path('views/'.$this->publishPath),
        ]);

        $this->publishes([
            __DIR__.'/../../tests' => base_path('tests/'.$this->publishPath),
        ]);
    }
}
