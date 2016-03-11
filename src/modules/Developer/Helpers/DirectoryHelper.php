<?php

namespace Doitonlinemedia\Admin\Modules\Developer\Helpers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;

class DirectoryHelper {

    public static function createModuleDirectory($name) {
        $dir_name = studly_case(str_slug($name));
        if(!File::exists(base_path('modules/'.$dir_name))) {
            Artisan::call('module:make', [
                'name' => [$dir_name],
            ]);

            $http_path = base_path('modules/' . $dir_name . '/Http/');
            $content = "<?php
                        \nRoute::get('/', '".studly_case($name)."Controller@index');";
            File::put(base_path('modules/' . $dir_name) . '/start.php', "");
            unlink(base_path('modules/' . $dir_name . '/Http/routes.php'));
            File::put($http_path . 'BackendRoutes.php', $content);
            File::put($http_path . 'FrontendRoutes.php', "<?php ");

            $view_path = base_path('modules/' . $dir_name) . '/Resources/views/';
            $content = File::get($view_path.'index.blade.php');
            $content = str_replace(strtolower($dir_name).'::', 'backend.', $content);
            File::put($view_path.'index.blade.php', $content);

            return true;
        }else{
            return false;
        }
    }

}