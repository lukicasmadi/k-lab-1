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

    Route::group(['prefix' => 'data'], function () {
        Route::get('/category', 'CategoryController@data')->name('category_data');
        Route::get('/article', 'ArticleController@data')->name('article_data');
        Route::get('/polda', 'PoldaController@data')->name('polda_data');
    });
});

Route::match(['post', 'get'], 'change-password', 'UserController@changePassword')->name('changePassword');
Route::match(['post', 'get'], 'profile', 'UserController@profile')->name('profile');