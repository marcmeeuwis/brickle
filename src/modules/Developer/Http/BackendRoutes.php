<?php


Route::get('/', ['as' => 'index', 'uses' => 'DeveloperController@index']);

RouteHelper::resource('datatypes', 'DataTypeController');

Route::group([
    'prefix' => 'document',
    'as' => 'document.'
], function() {
    RouteHelper::resource('types', 'DocumentTypeController');

    RouteHelper::resource('property', 'PropertyController', ['only' => ['destroy']]);
    RouteHelper::resource('tabs', 'TabController', ['only' => ['store', 'destroy']]);
});

Route::get('tests', ['as' => 'unit_tests_home', 'uses' => 'TestsController@index']);
Route::get('run-tests', ['as' => 'run_unit_tests', 'uses' => 'TestsController@runTests']);
Route::get('get-test-results', ['as' => 'get_test_results', 'uses' => 'TestsController@getTestResults']);

