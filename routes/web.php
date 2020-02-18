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

    Route::group([
        'as' => 'membership.',
        'prefix' => 'membership'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'MembershipController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'MembershipController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'MembershipController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'MembershipController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'MembershipController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'MembershipController@destroy'
        ]);
    });

    Route::group([
        'as' => 'employee.',
        'prefix' => 'employee'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'EmployeeController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'EmployeeController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'EmployeeController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'EmployeeController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'EmployeeController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'EmployeeController@destroy'
        ]);
    });


    Route::group([
        'as' => 'member.',
        'prefix' => 'member'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'MemberController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'MemberController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'MemberController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'MemberController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'MemberController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'MemberController@destroy'
        ]);
    });

    Route::group([
        'as' => 'trainer.',
        'prefix' => 'trainer'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'TrainerController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'TrainerController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'TrainerController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'TrainerController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'TrainerController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'TrainerController@destroy'
        ]);
    });

    Route::group([
        'as' => 'supplier.',
        'prefix' => 'supplier'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'SupplierController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'SupplierController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'SupplierController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'SupplierController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'SupplierController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'SupplierController@destroy'
        ]);
    });

    Route::group([
        'as' => 'treasury.',
        'prefix' => 'treasury'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'TreasuryController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'TreasuryController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'TreasuryController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'TreasuryController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'TreasuryController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'TreasuryController@destroy'
        ]);
    });

    Route::group([
        'as' => 'service.',
        'prefix' => 'service'
    ], function () {
        Route::get('/', [
            'as' => 'list',
            'uses' => 'ServiceController@index'
        ]);

        Route::get('/create', [
            'as' => 'create',
            'uses' => 'ServiceController@create'
        ]);

        Route::post('/', [
            'as' => 'store',
            'uses' => 'ServiceController@store'
        ]);

        /* Route::post('staff/create','StaffController@createStaff'); */

        Route::get('/edit/{id}', [
            'as' => 'edit',
            'uses' => 'ServiceController@edit'
        ]);
        Route::put('/{id}', [
            'as' => 'update',
            'uses' => 'ServiceController@update'
        ]);
        Route::delete('/{id}', [
            'as' => 'destroy',
            'uses' => 'ServiceController@destroy'
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
