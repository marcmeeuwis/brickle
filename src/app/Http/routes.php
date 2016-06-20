<?php

Route::group([

    'namespace' => 'Doitonlinemedia\Admin\App\Http\Controllers',
    'prefix' => config('admin.cms_path'),
    'as' => 'admin::',
    'middleware' => ['web']],

    function () {

        RouteHelper::auth();

        Route::group(['middleware' => ['admin.auth', 'admin.web']], function() {

            Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);

            
            Route::get('test', function() {
                $repo = new Doitonlinemedia\Admin\App\Repositories\DocumentRepository\DocumentEloquentRepository;
                
            });     

            RouteHelper::resource('content', 'ContentController');

        });

});
