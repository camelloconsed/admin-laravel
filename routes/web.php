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
    return view('auth.login');
});

Auth::routes(['register' => false]);

Route::middleware('auth:web')->group(function(){
Route::post('customer_store','CustomerController@store');
Route::resource('customer','CustomerController');
Route::get('customer/{id}/user', [
    'uses'  => 'UserController@index',
    'as'    => 'users.index'
    ]);
    Route::get('users/create/{id}', [
        'uses'  => 'UserController@create',
        'as'    => 'users.create'
        ]);
        
Route::post('/updateUser','UserController@update')->name('updateUser');
Route::get('users/{id}/{idCustomer}/edit', 'UserController@edit')->name('users.edit');
Route::resource('users', 'UserController')->except('index','create','edit');      

    });