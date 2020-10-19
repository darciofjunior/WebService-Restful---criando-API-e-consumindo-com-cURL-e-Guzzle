<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1'], function() {

    Route::post('auth', 'Auth\AuthApiController@authenticate');
    Route::post('auth-refresh', 'Auth\AuthApiController@refreshToken');
    
    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::get('products/search', 'Api\V1\ProductController@search');
        Route::resource('products', 'Api\V1\ProductController', ['except' => ['create', 'edit']]);
    });
});

/*Route::group(['prefix' => 'v2'], function() {
    Route::resource('products', 'Api\V2\ProductController', ['except' => ['create', 'edit']]);
});*/