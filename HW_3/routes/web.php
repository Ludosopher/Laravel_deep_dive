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

Route::get('/authorization', 'AuthorizController@index')->name('Authoriz');

Route::group( [
    'prefix' => 'admin',
    'namespace' => 'admin',
    'as' => 'admin.'
], function() {
    Route::get('/', 'IndexController@index')->name('Index');
    Route::get('/test1', 'IndexController@test1')->name('Test1');
    Route::get('/test2', 'IndexController@test2')->name('Test2');
    Route::get('/adding_news', 'IndexController@adding_news')->name('AddingNews');
});


Route::group( [
    'prefix' => 'news',
    'as' => 'news.'
], function() {
    Route::get('/all', 'NewsController@index')->name('index');
    Route::get('/one/{id}','NewsController@show')->name('newsOne');

    Route::group( [
        'prefix' => 'catalog'
    ], function() {
        Route::get('/', 'CatalogController@index')->name('catalog');
        Route::get('/{name}','CatalogController@show')->name('categoryOne');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
