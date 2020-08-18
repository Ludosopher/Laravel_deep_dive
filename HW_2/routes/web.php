<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', [
//    'uses' => 'HomeController@index'
//    ]); // используем массив если несколько действий

Route::get('/', 'HomeController@index')->name('Home');

Route::group( [
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function() {
    Route::get('/', 'IndexController@index')->name('Index');
    Route::get('/test1', 'IndexController@test1')->name('Test1');
    Route::get('/test2', 'IndexController@test2')->name('Test2');
});


Route::get('/catalog', 'CatalogController@index')->name('Catalog');

Route::get('/catalog/{id}','CatalogController@show')->name('CategoryOne');

Route::get('/news', 'NewsController@index')->name('News');

Route::get('/news/{id}','NewsController@show')->name('NewsOne');
