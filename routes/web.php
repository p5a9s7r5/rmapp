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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/users', 'AdminUsersController')->middleware('auth');
Route::get('/admin/users/{id}/delete', 'AdminUsersController@delete')->middleware('auth');

Route::get('/admin/orders/aprofit', 'AdminOrdersController@aprofit')->middleware('auth');
Route::resource('admin/orders', 'AdminOrdersController')->middleware('auth');

Route::resource('admin/items', 'AdminItemsController')->middleware('auth');

Route::resource('admin/banks', 'AdminBanksController')->middleware('auth');

