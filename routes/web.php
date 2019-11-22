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
Route::get('/admin/orders/payments', 'AdminOrdersController@payments')->middleware('auth')->name('orders.payments');
Route::get('/admin/orders/shipping', 'AdminOrdersController@shipping')->middleware('auth')->name('orders.shipping');
Route::get('/admin/orders/paycheck/{id}', 'AdminOrdersController@paycheck')->middleware('auth')->name('orders.paycheck');
Route::put('/admin/orders/paycheck/{id}', 'AdminOrdersController@updatepay')->middleware('auth');
Route::get('/admin/orders/shipedit/{id}', 'AdminOrdersController@shipedit')->middleware('auth')->name('orders.shipedit');
Route::put('/admin/orders/shipedit/{id}', 'AdminOrdersController@updateship')->middleware('auth');
Route::resource('admin/orders', 'AdminOrdersController')->middleware('auth');

Route::resource('admin/items', 'AdminItemsController')->middleware('auth');

Route::resource('admin/banks', 'AdminBanksController')->middleware('auth');

Route::get('forms/ml/{id}', 'FormsController@mlpay');
Route::post('forms/ml/', 'FormsController@confirmpay');
Route::post('forms/ml/confirmpay/', 'FormsController@pay');
Route::post('forms/ml2/', 'FormsController@confirmship');
Route::post('forms/ml/confirmship/', 'FormsController@ship');
Route::get('forms/prueba', 'FormsController@prueba');