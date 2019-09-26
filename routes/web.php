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

Route::post('customer_store','CustomerController@store');
Route::resource('customer','CustomerController');
Route::get('users/{id}/customer', [
    'uses'  => 'UserController@index',
    'as'    => 'users.index'
]);
Route::resource('users', 'UserController')->except('index');      