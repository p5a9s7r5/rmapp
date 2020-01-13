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
Route::get('/alert', 'HomeController@alert')->name('alert');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/alert/{id}', 'AdminController@alert')->name('admin.alert');

Route::resource('admin/users', 'AdminUsersController');
Route::get('/admin/users/{id}/delete', 'AdminUsersController@delete')->name('users.delete');

Route::get('/admin/orders/aprofit', 'AdminOrdersController@aprofit')->middleware('accessOper');
Route::get('/admin/orders/payments', 'AdminOrdersController@payments')->middleware('accessOper')->name('orders.payments');
Route::get('/admin/orders/shipping', 'AdminOrdersController@shipping')->name('orders.shipping');
Route::get('/admin/orders/paycheck/{id}', 'AdminOrdersController@paycheck')->middleware('accessOper')->name('orders.paycheck');
Route::put('/admin/orders/paycheck/{id}', 'AdminOrdersController@updatepay')->middleware('accessOper');
Route::get('/admin/orders/shipedit/{id}', 'AdminOrdersController@shipedit')->middleware('accessOper')->name('orders.shipedit');
Route::put('/admin/orders/shipedit/{id}', 'AdminOrdersController@updateship')->middleware('accessOper');
Route::get('/admin/orders/guides', 'AdminOrdersController@guides')->name('orders.guides');
Route::put('/admin/orders/guides/{id}', 'AdminOrdersController@updateguide');
Route::get('/admin/orders/pdfguide/{id}', 'AdminOrdersController@pdfguide')->name('orders.pdfguide');
Route::get('/admin/orders/contact', 'AdminOrdersController@contact')->name('orders.contact');
Route::put('/admin/orders/contact/{id}', 'AdminOrdersController@updatecontact');
Route::get('/admin/orders/phoneedit/{id}', 'AdminOrdersController@phoneedit')->name('orders.phoneedit');
Route::put('/admin/orders/phoneedit/{id}', 'AdminOrdersController@updatephone');
Route::resource('admin/orders', 'AdminOrdersController');

Route::get('/admin/items/replenish', 'AdminItemsController@replenish')->name('items.replenish');
Route::post('/admin/items/buy', 'AdminItemsController@buy')->name('items.buy');
Route::post('/admin/items/confirmbuy', 'AdminItemsController@confirmbuy')->name('items.confirmbuy');
Route::resource('admin/items', 'AdminItemsController');

Route::resource('admin/banks', 'AdminBanksController');

Route::get('/admin/taxes', 'AdminTaxesController@index')->name('admin.taxes');
Route::put('/admin/taxes/{id}', 'AdminTaxesController@update');

Route::get('forms/ml/{id}', 'FormsController@mlpay');
Route::post('forms/ml/', 'FormsController@confirmpay');
Route::post('forms/ml/confirmpay/', 'FormsController@pay');
Route::post('forms/ml2/', 'FormsController@confirmship');
Route::post('forms/ml/confirmship/', 'FormsController@ship');
