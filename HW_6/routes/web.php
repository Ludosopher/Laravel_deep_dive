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
    'namespace' => 'admin',
    'as' => 'admin.'
], function() {
    // Route::get('/', 'IndexController@index')->name('Index');
    Route::get('/test1', 'IndexController@test1')->name('Test1');
    Route::get('/test2', 'IndexController@test2')->name('Test2');

    // CRUD news
    Route::get('/', 'NewsController@index')->name('Index');
    Route::match(['get', 'post'],'/create', 'NewsController@create')->name('Create');
    Route::get('/edit/{news}', 'NewsController@edit')->name('Edit');
    Route::post('/update/{news}', 'NewsController@update')->name('Update');
    Route::get('/destroy/{news}', 'NewsController@destroy')->name('Destroy');

    // CRUD catalog
    Route::get('/catalog', 'CatalogController@index')->name('catalog.Index');
    Route::match(['get', 'post'],'/catalog/create', 'CatalogController@create')->name('catalog.Create');
    Route::get('/catalog/edit/{categories}', 'CatalogController@edit')->name('catalog.Edit');
    Route::post('/catalog/update/{categories}', 'CatalogController@update')->name('catalog.Update');
    Route::get('/catalog/destroy/{categories}', 'CatalogController@destroy')->name('catalog.Destroy');
});


Route::group( [
    'prefix' => 'news',
    'as' => 'news.'
], function() {
    Route::get('/all', 'NewsController@index')->name('index');
    Route::get('/one/{news}','NewsController@show')->name('newsOne');

    Route::group( [
        'prefix' => 'catalog'
    ], function() {
        Route::get('/', 'CatalogController@index')->name('catalog');
        Route::get('/{name}','CatalogController@show')->name('categoryOne');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
