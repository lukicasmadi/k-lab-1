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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/polda/{id}/{any}', 'ProfileController@profile')->name('profile');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/category', 'CategoryController@index')->name('category_index');
    Route::match(['post', 'get'], '/category/add', 'CategoryController@add')->name('category_add');
    Route::match(['post', 'get'], '/category/edit/{id}', 'CategoryController@edit')->name('category_edit');
    Route::post('/category/delete/{id}', 'CategoryController@delete')->name('category_delete');

    Route::get('/article', 'ArticleController@index')->name('article_index');
    Route::match(['post', 'get'], '/article/add', 'ArticleController@add')->name('article_add');
    Route::match(['post', 'get'], '/article/edit/{id}', 'CategoryController@edit')->name('article_edit');
    Route::post('/article/delete/{id}', 'CategoryController@delete')->name('article_delete');

    Route::group(['prefix' => 'data'], function () {
        Route::get('/category', 'CategoryController@data')->name('category_data');
        Route::get('/article', 'ArticleController@data')->name('article_data');
    });
});