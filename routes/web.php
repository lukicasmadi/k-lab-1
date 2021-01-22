<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    if (empty(auth()->user())) {
        return redirect('/login');
    }
});

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('dashboard');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/category', 'CategoryController@index')->name('category_index');
    Route::get('/category/add', 'CategoryController@add')->name('category_add');
    Route::post('/category/add/process', 'CategoryController@save_process')->name('category_save');
    Route::get('/category/edit/{uuid}', 'CategoryController@edit')->name('category_edit');
    Route::post('/category/update/{uuid}', 'CategoryController@update')->name('category_update');
    Route::get('/category/delete/{uuid}', 'CategoryController@delete')->name('category_delete');

    Route::get('/article', 'ArticleController@index')->name('article_index');
    Route::get('/article/add', 'ArticleController@add')->name('article_add');
    Route::post('/article/add/process', 'ArticleController@save_process')->name('article_save');
    Route::get('/article/edit/{articleUuid}', 'ArticleController@edit')->name('article_edit');
    Route::post('/article/edit/{articleUuid}', 'ArticleController@update')->name('article_update');
    Route::get('/article/delete/{articleUuid}', 'ArticleController@delete')->name('article_delete');

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

    Route::resource('operasi', 'RencanaOperasiController', [
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

    Route::get('/laporan/all', 'ReportController@all')->name('laporan_all');
    Route::get('/laporan/polda/{aka}', 'ReportController@byAka')->name('laporan_by_aka');
    Route::get('/laporan/polda/{date}', 'ReportController@byOneDate')->name('laporan_by_one_date');
    Route::get('/laporan/polda/{daterange}', 'ReportController@dateRange')->name('laporan_by_date_range');

    Route::get('/acl/role', 'AclController@role')->name('role');
    Route::get('/acl/role/create', 'AclController@create')->name('role_create');
    Route::post('/acl/role/store', 'AclController@store')->name('role_store');
    Route::get('/acl/role/{id}/edit', 'AclController@edit')->name('role_edit');
    Route::patch('/acl/role/{id}/update', 'AclController@update')->name('role_update');
    Route::delete('/acl/role/{id}/delete', 'AclController@destroy')->name('role_delete');

    Route::get('/acl/premission', 'AclController@premission')->name('premission');
    Route::get('/acl/premission/create', 'AclController@premission_create')->name('premission_create');
    Route::get('/acl/premission/delete/{id}', 'AclController@premission_delete')->name('premission_delete');

    Route::get('/acl/user-has-role', 'AclController@userHasRole')->name('user_has_role');
    Route::get('/acl/user-has-role/create', 'AclController@userHasRoleCreate')->name('user_has_role_create');
    Route::get('/acl/user-has-role/delete/{id}', 'AclController@userHasRoleDelete')->name('user_has_role_delete');

    Route::group(['prefix' => 'data'], function () {
        Route::get('/category', 'CategoryController@data')->name('category_data');
        Route::get('/article', 'ArticleController@data')->name('article_data');
        Route::get('/polda', 'PoldaController@data')->name('polda_data');
    });
});

Route::get('change-password', 'UserController@changePassword')->name('change_password');
Route::post('change-password/process', 'UserController@change_password_process')->name('change_password_process');

Route::get('profile', 'UserController@profile')->name('profile');
Route::post('profile/process', 'UserController@profile_process')->name('profile_process');