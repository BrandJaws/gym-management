<?php

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
],function () {
    Route::get('/', [
        'as' => 'admin',
        'uses' => 'DashboardController@dashboard'
    ]);
    Route::get('/login',[
        'as' => 'login',
        'uses' => 'AuthController@login'
    ]);
    Route::get('password/reset',[
        'as' => 'reset',
        'uses' => 'AuthController@reset'
    ]);

    Route::group([
        'as' => 'gym.',
        'prefix' => 'gym'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'GymController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'GymController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'GymController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'GymController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'GymController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'GymController@destroy'
        ]);
    });

});

Route::group([
    'prefix' => 'employee',
    'namespace' => 'Employee'
],function () {
    Route::get('/', [
        'as' => 'employee',
        'uses' => 'DashboardController@dashboard'
    ]);
    Route::get('/login',[
        'as' => 'employeeLogin',
        'uses' => 'AuthController@login'
    ]);
    Route::get('password/reset',[
        'as' => 'employeePasswordReset',
        'uses' => 'AuthController@reset'
    ]);
});

Route::group([
    'prefix' => 'member',
    'namespace' => 'Member'
],function () {
    Route::get('/', [
        'as' => 'member',
        'uses' => 'DashboardController@dashboard'
    ]);
    Route::get('/login',[
        'as' => 'memberLogin',
        'uses' => 'AuthController@login'
    ]);
    Route::get('password/reset',[
        'as' => 'memberPasswordReset',
        'uses' => 'AuthController@reset'
    ]);
});

Route::group([
    'prefix' => 'trainer',
    'namespace' => 'Trainer'
],function () {
    Route::get('/', [
        'as' => 'trainer',
        'uses' => 'DashboardController@dashboard'
    ]);
    Route::get('/login',[
        'as' => 'trainerLogin',
        'uses' => 'AuthController@login'
    ]);
    Route::get('password/reset',[
        'as' => 'trainerPasswordReset',
        'uses' => 'AuthController@reset'
    ]);
});
