<?php namespace Doitonlinemedia\Admin\App\Helpers;

use Illuminate\Support\Facades\Route;

class RouteHelper
{

    public static function resource($name, $controller)
    {
        Route::get($name, ['as' => $name.'.index', 'uses' => $controller.'@index']);
        Route::get($name.'/{'.$name.'}', ['as' => $name.'.show', 'uses' => $controller.'@show']);
        Route::get($name.'/create', ['as' => $name.'.create', 'uses' => $controller.'@create']);
        Route::get($name.'/{'.$name.'}/edit', ['as' => $name.'.edit', 'uses' => $controller.'@edit']);
        Route::post($name, ['as' => $name.'.store', 'uses' => $controller.'@store']);
        Route::put($name.'/{'.$name.'}', ['as' => $name.'.update', 'uses' => $controller.'@update']);
        Route::delete($name.'/{'.$name.'}', ['as' => $name.'.destroy', 'uses' => $controller.'@destroy']);
    }

    public static function auth()
    {
        Route::get(trans('admin::routes.auth.login'), ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
        Route::post(trans('admin::routes.auth.login'), 'Auth\AuthController@postLogin');
        Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
        Route::get(trans('admin::routes.auth.register'), 'Auth\AuthController@getRegister');
        Route::post(trans('admin::routes.auth.register'), 'Auth\AuthController@postRegister');
    }

}