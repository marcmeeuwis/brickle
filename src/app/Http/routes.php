<?php

Route::group([

   'namespace' => 'DoitOnlineMedia\Admin\App\Http\Controllers',
   'prefix' => config('admin.cms_path'),
   'as' => 'admin::',
   'middleware' => ['web']],

function () {

   RouteHelper::auth();

   Route::group(['middleware' => ['admin.auth', 'admin.web']], function() {

      Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

      RouteHelper::resource('content', 'ContentController');

   });

});
