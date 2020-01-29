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

    'namespace' => 'Member'

],function () {

    Route::get('/memberlist', 'MemberController@index');
//    Route::get('/memberlist/{id}','MemberController@show');
    Route::get('/createmember','MemberController@create');
//    Route::post('/memberlist','MemberController@store');
//    Route::get('/memberlist/{id}/edit','MemberController@edit');
//    Route::put('memberlist/{id}','MemberController@update');
//    Route::delete('/memberlist/{id}','MemberController@destroy');

});
