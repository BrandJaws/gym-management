<?php

/*-----------------------------------------------------------------------------------*/
/*------------------------------------Admin Routes------------------------------------*/
/*-----------------------------------------------------------------------------------*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', ['as' => 'admin.home', 'uses' => 'DashboardController@dashboard']);
    Route::get('/login', ['as' => 'admin.login', 'uses' => 'AuthController@login']);
    Route::get('password/reset', ['as' => 'admin.reset', 'uses' => 'AuthController@reset']);


    Route::group(['as' => 'gym.', 'prefix' => 'gym'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'GymController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'GymController@create']);
        Route::post('/create', ['as' => 'create', 'uses' => 'GymController@store']);
        Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'GymController@destroy']);
        Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'GymController@edit']);


        Route::get('/license', ['as' => 'licenseList', 'uses' => 'GymController@license']);
        Route::get('license/create', ['as' => 'licenseCreate', 'uses' => 'GymController@licenseCreate']);
    });

    Route::group(['as' => 'adminEmployee.', 'prefix' => 'employee'], function () {

        Route::get('/', ['as' => 'list', 'uses' => 'EmployeeController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'EmployeeController@create']);
        Route::post('/create', ['as' => 'create', 'uses' => 'EmployeeController@store']);
    });

});

/*-----------------------------------------------------------------------------------*/
/*------------------------------------Gym System Routes------------------------------------*/
/*-----------------------------------------------------------------------------------*/

Route::group(['prefix' => 'gym', 'namespace' => 'Gym'], function () {

    Route::get('/', ['as' => 'gym.home', 'uses' => 'DashboardController@dashboard']);
    Route::get('/login', ['as' => 'gym.login', 'uses' => 'AuthController@login']);
    Route::get('password/reset', ['as' => 'gym.reset', 'uses' => 'AuthController@reset']);

    Route::group(['as' => 'employee.', 'prefix' => 'employee'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'EmployeeController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'EmployeeController@create']);
    });

    Route::group(['as' => 'membership.', 'prefix' => 'membership'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'MembershipController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'MembershipController@create']);
    });

    Route::group(['as' => 'member.', 'prefix' => 'member'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'MemberController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'MemberController@create']);
    });

    Route::group(['as' => 'trainer.', 'prefix' => 'trainer'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'TrainerController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'TrainerController@create']);
    });

    Route::group(['as' => 'supplier.', 'prefix' => 'supplier'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'SupplierController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'SupplierController@create']);
    });

    Route::group(['as' => 'treasury.', 'prefix' => 'treasury'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'TreasuryController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'TreasuryController@create']);
    });

    Route::group(['as' => 'service.', 'prefix' => 'service'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'ServiceController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'ServiceController@create']);
    });

});
