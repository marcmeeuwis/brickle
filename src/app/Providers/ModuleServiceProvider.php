<?php

namespace DoitOnlineMedia\Admin\App\Providers;

use Illuminate\Support\ServiceProvider;
use Pingpong\Modules\Facades\Module;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->routes();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    private function routes()
    {
        $router = $this->app['router'];

        Module::collections()->each(function($module, $key) use($router) {

            $namespace ='Modules\\'.$module->getStudlyName().'\Http\Controllers';
            $path = $module->getPath() . '/Http/';

            $router->group([

                'namespace' => $namespace,
                'middleware' => ['web','auth'],
                'prefix' => config('admin.cms_path').'/'.$module->getName(),
                'as' => 'admin::'.$module->getName().'.'

            ],function() use($path, $module) {

                $file = $path.'BackendRoutes.php';
                if(file_exists($file)) require_once($file);

            });

            $router->group(['namespace' => $namespace], function() use($path, $module) {
                $file = $path.'FrontendRoutes.php';
                if(file_exists($file)) require_once($file);
            });

        });
    }
}
