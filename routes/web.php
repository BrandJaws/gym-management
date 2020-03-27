<?php

Route::get('/', ['as' => 'dashboard', 'uses' => 'HomeController@index']);

/*-----------------------------------------------------------------------------------*/
/*------------------------------------Admin Routes------------------------------------*/
/*-----------------------------------------------------------------------------------*/


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', ['as' => 'admin.login', 'uses' => 'AuthController@index']);
    Route::get('/login', ['as' => 'admin.login', 'uses' => 'AuthController@index']);
    Route::post('/login', ['as' => 'admin.login', 'uses' => 'AuthController@login']);
    Route::post('/logout', ['as' => 'admin.logout', 'uses' => 'AuthController@logout']);
    Route::get('password/reset', ['as' => 'admin.reset', 'uses' => 'AuthController@reset']);


    Route::group(['middleware' => ['auth.admin']], function () {

        Route::get('/dashboard', ['as' => 'admin.home', 'uses' => 'DashboardController@dashboard']);
        Route::get('/profile', ['as' => 'admin.profile', 'uses' => 'AuthController@profile']);
        Route::post('/profile', ['as' => 'admin.profile', 'uses' => 'AuthController@updateProfile']);

        /*-----------------------------------------------------------------------------------*/
        /*------------------------------------GYM Routes-------------------------------------*/
        /*-----------------------------------------------------------------------------------*/

        Route::group(['as' => 'gym.', 'prefix' => 'gym'], function () {
            Route::get('/', ['as' => 'member', 'uses' => 'GymController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'GymController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'GymController@store']);
            Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'GymController@destroy']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'GymController@edit']);
            Route::post('/edit', ['as' => 'edit', 'uses' => 'GymController@update']);

            /*-----------------------------------------------------------------------------------*/
            /*------------------------------------GYM Branches Routes-----------------------------*/
            /*-----------------------------------------------------------------------------------*/

            Route::get('branch/add/{id}', ['as' => 'branchCreate', 'uses' => 'GymController@branchCreate']);
            Route::post('branch/add', ['as' => 'branchAdd', 'uses' => 'GymController@branchAdd']);
            Route::get('/destroyBranch/{id}', ['as' => 'destroyBranch', 'uses' => 'GymController@destroyBranch']);
            Route::get('branch/edit/{id}', ['as' => 'editBranch', 'uses' => 'GymController@editBranch']);
            Route::post('branch/edit', ['as' => 'branchUpdate', 'uses' => 'GymController@branchUpdate']);

            Route::get('/license', ['as' => 'licenseList', 'uses' => 'GymController@license']);
            Route::get('license/create', ['as' => 'licenseCreate', 'uses' => 'GymController@licenseCreate']);
        });
    });
});


/*-----------------------------------------------------------------------------------*/
/*------------------------------------Gym System Routes-------------------------------*/
/*-----------------------------------------------------------------------------------*/

Route::group(['prefix' => 'gym', 'namespace' => 'Gym'], function () {

    Route::get('/', ['as' => 'gym.login', 'uses' => 'AuthController@index']);
    Route::get('/login', ['as' => 'gym.login', 'uses' => 'AuthController@index']);
    Route::post('/login', ['as' => 'gym.login', 'uses' => 'AuthController@login']);
    Route::post('/logout', ['as' => 'gym.logout', 'uses' => 'AuthController@logout']);
    Route::get('password/reset', ['as' => 'gym.reset', 'uses' => 'AuthController@reset']);

    Route::group(['middleware' => ['auth.employee']], function () {

        Route::get('/dashboard', ['as' => 'gym.home', 'uses' => 'DashboardController@dashboard']);
        Route::get('/profile', ['as' => 'gym.profile', 'uses' => 'AuthController@profile']);
        Route::post('/profile', ['as' => 'gym.profile', 'uses' => 'AuthController@updateProfile']);

        Route::group(['as' => 'employee.', 'prefix' => 'employee'], function () {
            Route::get('/', ['as' => 'member', 'uses' => 'EmployeeController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'EmployeeController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'EmployeeController@store']);
            Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'EmployeeController@destroy']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'EmployeeController@edit']);
            Route::post('/edit', ['as' => 'edit', 'uses' => 'EmployeeController@update']);
        });

        Route::group(['as' => 'membership.', 'prefix' => 'membership'], function () {
            Route::get('/', ['as' => 'member', 'uses' => 'MembershipController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'MembershipController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'MembershipController@store']);
            Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'MembershipController@destroy']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'MembershipController@edit']);
            Route::post('/edit', ['as' => 'edit', 'uses' => 'MembershipController@update']);
        });

        /*-----------------------------------------------------------------------------------*/
        /*------------------------------------GYM Members Routes--------------------------------*/
        /*-----------------------------------------------------------------------------------*/

        Route::group(['as' => 'member.', 'prefix' => 'member'], function () {
            Route::get('/', ['as' => 'dashboard', 'uses' => 'MemberController@dashobard']);
            Route::get('/list', ['as' => 'member', 'uses' => 'MemberController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'MemberController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'MemberController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'MemberController@edit']);
            Route::post('/edit', ['as' => 'edit', 'uses' => 'MemberController@update']);
            Route::get('/disabled/{id}', ['as' => 'disabled', 'uses' => 'MemberController@disabled']);
            Route::get('/disabledList', ['as' => 'disabledList', 'uses' => 'MemberController@disabledList']);
            Route::get('/distroy/{id}', ['as' => 'distroy', 'uses' => 'MemberController@distroy']);
            Route::get('/restore/{id}', ['as' => 'restore', 'uses' => 'MemberController@restore']);

            /*-----------------------------------------------------------------------------------*/
            /*------------------------------------ Archive And Guest Routes------------------------*/
            /*-----------------------------------------------------------------------------------*/
            Route::get('/archive/{action}/{id}', ['as' => 'pipelineCreate', 'uses' => 'MemberController@pipelineCreate']);
            Route::post('/archive', ['as' => 'pipelineStore', 'uses' => 'MemberController@pipelineStore']);
            Route::get('/guest/{status}/{id}', ['as' => 'pipelineEdit', 'uses' => 'MemberController@pipelineEdit']);
            Route::get('/archive/{status}', ['as' => 'archive', 'uses' => 'MemberController@archive']);
            Route::get('/guest/{status}', ['as' => 'guest', 'uses' => 'MemberController@guest']);
            Route::post('/pipelineUpdate', ['as' => 'pipelineUpdate', 'uses' => 'MemberController@pipelineUpdate']);
            Route::get('/pipelineDisable/{id}', ['as' => 'pipelineDisable', 'uses' => 'MemberController@pipelineDisable']);
            Route::get('/calls/disabled', ['as' => 'pipelineDisabled', 'uses' => 'MemberController@pipelineDisabled']);
            Route::get('/distroyPipeline/{id}', ['as' => 'distroyPipeline', 'uses' => 'MemberController@distroyPipeline']);
            Route::get('/restorePipeline/{id}', ['as' => 'restorePipeline', 'uses' => 'MemberController@restorePipeline']);

            /*-----------------------------------------------------------------------------------*/
            /*------------------------------------ Report Routes --------------------------------*/
            /*-----------------------------------------------------------------------------------*/

            Route::get('/reports', ['as' => 'reports', 'uses' => 'MemberController@reports']);
            Route::post('/daterange/fetch_data', ['as' => 'fetch_data', 'uses' => 'MemberController@fetch_data']);
        });

        Route::group(['as' => 'trainer.', 'prefix' => 'trainer'], function () {
            Route::get('/', ['as' => 'member', 'uses' => 'TrainerController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'TrainerController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'TrainerController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'TrainerController@edit']);
            Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'TrainerController@destroy']);
        });

        Route::group(['as' => 'supplier.', 'prefix' => 'supplier'], function () {
            Route::get('/', ['as' => 'member', 'uses' => 'SupplierController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'SupplierController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'SupplierController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'SupplierController@edit']);
            Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'SupplierController@destroy']);
        });


        /*-----------------------------------------------------------------------------------*/
        /*------------------------------------ Treasury Routes --------------------------------*/
        /*-----------------------------------------------------------------------------------*/

        Route::group(['as' => 'treasury.', 'prefix' => 'treasury'], function () {
            Route::get('/', ['as' => 'member', 'uses' => 'TreasuryController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'TreasuryController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'TreasuryController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'TreasuryController@edit']);
            Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'TreasuryController@destroy']);
        });

        Route::group(['as' => 'service.', 'prefix' => 'service'], function () {
            Route::get('/', ['as' => 'member', 'uses' => 'ServiceController@index']);
            Route::get('/create', ['as' => 'create', 'uses' => 'ServiceController@create']);
            Route::post('/create', ['as' => 'create', 'uses' => 'ServiceController@store']);
            Route::get('/edit/{id}', ['as' => 'edit', 'uses' => 'ServiceController@edit']);
            Route::get('/destroy/{id}', ['as' => 'destroy', 'uses' => 'ServiceController@destroy']);
        });
    });
});
