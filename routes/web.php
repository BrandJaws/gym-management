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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group([

    'namespace' => 'Admin'

],function () {

    Route::get('pages/posts', 'PostsController@index')->name('post.page');
    Route::get('/pages/posts/{id}','PostsController@show')->name('post.show');
    Route::get('/pages/create','PostsController@create')->name('post.create');
    Route::post('/pages/posts','PostsController@store')->name('post.store');
    Route::get('/pages/posts/{id}/edit','PostsController@edit')->name('post.edit');
    Route::put('pages/posts/{id}','PostsController@update')->name('post.update');
    Route::delete('/pages/posts/{id}','PostsController@destroy')->name('post.delete');

});
