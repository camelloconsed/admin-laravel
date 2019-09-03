<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('profile', 'V1\UserController@getProfile');


    Route::resource('orchards', 'V1\OrchardController');
    Route::resource('sectors', 'V1\SectorController');
    Route::resource('ubications', 'V1\UbicationController');
    Route::resource('devices', 'V1\DeviceController');

    
});
