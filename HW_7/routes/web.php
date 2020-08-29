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
//    Route::get('/news/', 'NewsController@index')->name('news.index');
//    Route::get('/news/create', 'NewsController@create')->name('news.create');
//    Route::post('/news/', 'NewsController@store')->name('news.store');
//    Route::get('/news/edit/{news}', 'NewsController@edit')->name('news.edit');
//    Route::put('/news/update/{news}', 'NewsController@update')->name('news.update');
//    Route::delete('/news/destroy/{news}', 'NewsController@destroy')->name('news.destroy');
    Route::resource('/news', 'NewsController')->except(['show']);

    // CRUD catalog
    Route::get('/catalog/', 'CatalogController@index')->name('catalog.index');
    Route::get('/catalog/create', 'CatalogController@create')->name('catalog.create');
    Route::post('/catalog/', 'CatalogController@store')->name('catalog.store');
    Route::get('/catalog/edit/{categories}', 'CatalogController@edit')->name('catalog.edit');
    Route::put('/catalog/update/{categories}', 'CatalogController@update')->name('catalog.update');
    Route::delete('/catalog/destroy/{categories}', 'CatalogController@destroy')->name('catalog.destroy');
    // Route::resource('/catalog', 'CatalogController')->except(['show']);
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
