<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    if (!empty(auth()->user())) {
        return redirect('/dashboard');
    } else {
        return view('index');
    }
})->name('home');

Auth::routes(['register' => false]);

Route::get('/polda/metro', function () {
    return view('polda');
});

Route::get('/article/detail', function() {
    return view('/article/detail');
});

Route::get('/article/all', function() {
    return view('/article/all');
});


Route::get('/forgot-password', 'UserController@forgot_password_index')->name('forgot_password_index');
Route::post('/forgot-password/process', 'UserController@forgot_password_process')->name('forgot_password_process');
Route::get('/not-assign', 'HomeController@notAssign')->name('notAssign');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
    Route::get('/preview/{uuid}/report', 'HomeController@previewReport')->name('previewReport');
    Route::get('/forgot-password/request', 'UserController@forgot_password_request')->name('forgot_password_request');
    Route::get('/dashboard/{uuid}/preview', 'PoldaHasRencanaOperasiController@previewPhroDashboard')->name('previewPhroDashboard');

    Route::group(['middleware' => 'user-has-polda'], function () {
        Route::resource('operation-onsite', 'PoldaHasRencanaOperasiController', [
            'names' => [
                'index' => 'phro_index',
                'create' => 'phro_create',
                'store' => 'phro_store',
                'show' => 'phro_show',
                'edit' => 'phro_edit',
                'update' => 'phro_update',
                'destroy' => 'phro_destroy',
            ]
        ]);
        Route::get('/operation-onsite/{uuid}/download', 'PoldaHasRencanaOperasiController@download')->name('downloadPrho');
        Route::get('/operation-onsite/{uuid}/preview', 'PoldaHasRencanaOperasiController@preview')->name('previewPhro');
    });

    Route::resource('operation-plan', 'RencanaOperasiController', [
        'names' => [
            'index' => 'rencana_operasi_index',
            'create' => 'rencana_operasi_create',
            'store' => 'rencana_operasi_store',
            'show' => 'rencana_operasi_show',
            'edit' => 'rencana_operasi_edit',
            'update' => 'rencana_operasi_update',
            'destroy' => 'rencana_operasi_destroy',
        ]
    ]);
    Route::get('/operation-plan/download/{filePath}', 'RencanaOperasiController@download')->name('downloadOperationPlan');

    Route::post('/operation-plan/create-new', 'RencanaOperasiController@store')->name('create_rencana_operasi_new');
    Route::post('/operation-plan/update-new', 'RencanaOperasiController@update')->name('edit_rencana_operasi_new');

    Route::get('/report/daily', 'ReportController@dailyAllPolda')->name('report_daily_all_polda');
    Route::post('/report/daily/process', 'ReportController@dailyProcess')->name('report_daily_process');
    Route::get('/report/daily/polda/{poldaUuid}', 'ReportController@poldaUuid')->name('report_bypolda');
    Route::get('/report/analysis-evaluation', 'ReportController@comparison')->name('report_comparison');
    Route::post('/report/analysis-evaluation/process', 'ReportController@comparisonProcess')->name('report_comparison_process');
    Route::get('/report/daily/id/{uuid}', 'ReportController@byId')->name('report_daily_by_id');


    // Route Hanya Bisa Diakses Oleh Administrator atau Korlantas Pusat
    Route::group(['middleware' => 'admin-or-pusat-only'], function () {
        Route::resource('unit', 'UnitController', [
            'names' => [
                'index' => 'unit_index',
                'create' => 'unit_create',
                'store' => 'unit_store',
                'show' => 'unit_show',
                'edit' => 'unit_edit',
                'update' => 'unit_update',
                'destroy' => 'unit_destroy',
            ]
        ]);

        Route::resource('polda', 'PoldaController', [
            'names' => [
                'index' => 'polda_index',
                'create' => 'polda_create',
                'store' => 'polda_store',
                'show' => 'polda_show',
                'edit' => 'polda_edit',
                'update' => 'polda_update',
                'destroy' => 'polda_destroy',
            ]
        ]);

        Route::get('/category', 'CategoryController@index')->name('category_index');
        Route::get('/category/add', 'CategoryController@add')->name('category_add');
        Route::post('/category/add/process', 'CategoryController@save_process')->name('category_save');
        Route::get('/category/{uuid}/edit', 'CategoryController@edit')->name('category_edit');
        Route::patch('/category/{uuid}/update', 'CategoryController@update')->name('category_update');
        Route::get('/category/{uuid}/delete', 'CategoryController@delete')->name('category_delete');

        Route::get('/article', 'ArticleController@index')->name('article_index');
        Route::get('/article/add', 'ArticleController@add')->name('article_add');
        Route::post('/article/add/process', 'ArticleController@save_process')->name('article_save');
        Route::get('/article/{articleUuid}/edit', 'ArticleController@edit')->name('article_edit');
        Route::patch('/article/{articleUuid}/update', 'ArticleController@update')->name('article_update');
        Route::get('/article/{articleUuid}/delete', 'ArticleController@delete')->name('article_delete');

        Route::get('/violation', 'ViolationController@index')->name('violation_index');
        Route::get('/violation/create', 'ViolationController@create')->name('violation_create');
        Route::post('/violation/store', 'ViolationController@store')->name('violation_store');
        Route::get('/violation/{uuid}/edit', 'ViolationController@edit')->name('violation_edit');
        Route::patch('/violation/{uuid}/update', 'ViolationController@update')->name('violation_update');
        Route::delete('/violation/{uuid}/delete', 'ViolationController@destroy')->name('violation_destroy');

        Route::get('/access/role', 'AclController@role_index')->name('role_index');
        Route::get('/access/role/create', 'AclController@role_create')->name('role_create');
        Route::post('/access/role/store', 'AclController@role_store')->name('role_store');
        Route::get('/access/role/{id}/edit', 'AclController@role_edit')->name('role_edit');
        Route::patch('/access/role/{id}/update', 'AclController@role_update')->name('role_update');
        Route::delete('/access/role/{id}/delete', 'AclController@role_delete')->name('role_delete');
        Route::get('/access/permission', 'AclController@permission_index')->name('permission_index');
        Route::get('/access/permission/create', 'AclController@permission_create')->name('permission_create');
        Route::post('/access/permission/store', 'AclController@permission_store')->name('permission_store');
        Route::get('/access/permission/{id}/edit', 'AclController@permission_edit')->name('permission_edit');
        Route::patch('/access/permission/{id}/update', 'AclController@permission_update')->name('permission_update');
        Route::delete('/acaccessl/permission/{id}/delete', 'AclController@permission_delete')->name('permission_delete');
        Route::get('/access/user-to-role', 'AclController@user_to_role_index')->name('user_to_role_index');
        Route::post('/access/user-to-role/add', 'AclController@user_to_role_add')->name('user_to_role_add');
        Route::get('/access/user', 'UserController@index')->name('user_index');
        Route::post('/access/user/store', 'UserController@store')->name('user_store');
        Route::get('/access/user/{id}/detail', 'UserController@user_detail')->name('user_detail');
        Route::delete('/access/user/{id}/delete', 'UserController@destroy')->name('user_delete');
        Route::get('/access/permission-to-role', 'AclController@permission_to_role_index')->name('permission_to_role_index');
        Route::post('/access/permission-to-role/add', 'AclController@permission_to_role_add')->name('permission_to_role_add');

        Route::get('/access/polda', 'UserHasPoldaController@polda_access_index')->name('polda_access_index');
        Route::get('/access/polda/create', 'UserHasPoldaController@polda_access_create')->name('polda_access_create');
        Route::post('/access/polda/store', 'UserHasPoldaController@polda_access_store')->name('polda_access_store');
        Route::get('/access/polda/{id}/edit', 'UserHasPoldaController@polda_access_edit')->name('polda_access_edit');
        Route::patch('/access/polda/{id}/update', 'UserHasPoldaController@polda_access_update')->name('polda_access_update');
        Route::delete('/access/polda/{id}/delete', 'UserHasPoldaController@polda_access_delete')->name('polda_access_delete');
    });

    Route::get('profile', 'UserController@profile')->name('profile');
    Route::post('profile/process', 'UserController@profile_process')->name('profile_process');
    Route::get('change-password', 'UserController@changePassword')->name('change_password');
    Route::post('change-password/process', 'UserController@change_password_process')->name('change_password_process');
    Route::post('/korlantas-rekap/daily/create', 'KorlantasRekapController@store')->name('korlantas_rekap_store');

    Route::group(['prefix' => 'data'], function () {
        Route::get('/category', 'CategoryController@data')->name('category_data');
        Route::get('/article', 'ArticleController@data')->name('article_data');
        Route::get('/polda', 'PoldaController@data')->name('polda_data');
        Route::get('/user', 'AclController@user_data')->name('user_data');
        Route::get('/role-has-permission/{id}', 'AclController@get_role_has_permission')->name('get_role_has_permission');
        Route::get('/unit', 'UnitController@data')->name('unit_data');
        Route::get('/violation', 'ViolationController@data')->name('violation_data');
        Route::get('/operation-plan', 'RencanaOperasiController@data')->name('operation_plan_data');
        Route::get('/role', 'AclController@role_data')->name('role_data');
        Route::get('/get-permission-by-role/{id}', 'AclController@get_permission_by_role')->name('get_permission_by_role');
        Route::get('/user-has-polda', 'UserHasPoldaController@data')->name('uhp_data');
        Route::get('/get-polda-list/{id}', 'UserHasPoldaController@check_user_polda')->name('check_user_polda');
        Route::get('/phro', 'PoldaHasRencanaOperasiController@data')->name('phro_data');
        Route::get('/polda/phro', 'HomeController@data')->name('phro_polda_data');
        Route::get('/totalinputan', 'HomeController@dashboardChart')->name('dashboardChart');
        Route::get('/phro/{uuid}/preview', 'PoldaHasRencanaOperasiController@preview')->name('phro_preview');
        Route::get('/phro/dailycheck', 'HomeController@dailycheck')->name('dailycheck');
        Route::get('/dashboard/donut', 'HomeController@donut')->name('donut');
        Route::get('/dashboard/notifikasi', 'HomeController@notifikasi')->name('notifikasi');
        Route::get('/dashboard/polda/mingguan', 'HomeController@weeklyPolda')->name('weeklyPolda');
        Route::get('/dashboard/polda/full', 'HomeController@fullPolda')->name('fullPolda');
        Route::get('/get/rencana-operasi/{uuid}', 'RencanaOperasiController@rencana_operasi_by_uuid')->name('rencana_operasi_by_uuid');
        Route::get('/korlantas-rekap/daily', 'KorlantasRekapController@data')->name('korlantas_rekap_data');
        Route::get('/korlantas-rekap/daily/byuuid/{uuid}', 'KorlantasRekapController@byuuid')->name('korlantas_rekap_data_byuuid');
    });
});