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

// Route::get('veiculos/find', 'VehicleController@find')->middleware('auth:api');
// Route::apiResource('veiculos', 'VehicleController')->middleware('auth:api');

Route::middleware('auth:api')->group(function () use ($router) {
    Route::apiResource('patients', 'PatientController');
    Route::post('patients/{patient}/phones', 'PatientPhoneController@store');
    Route::get('patients/{patient}/phones', 'PatientPhoneController@index');
    // $router->get('', 'MotoristaController@index');
    // $router->post('', 'MotoristaController@store');
    // $router->get('/{moto_id}', 'MotoristaController@show');
    // $router->put('/{moto_id}', 'MotoristaController@update');
    // $router->patch('/{moto_id}', 'MotoristaController@update');
    // $router->delete('{moto_id}', 'MotoristaController@destroy');
});

// $router->group(
//     [ 'middleware' => 'auth' ],
//     function () use ($router) {
