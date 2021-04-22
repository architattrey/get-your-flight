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

Route::get('/city/{id?}','Data\DataController@city');
Route::get('/airport','Data\DataController@airport');
Route::get('/airportcitycountry/{id?}','Data\DataController@airportcitycountry');
Route::get('/hotelcitycode/{id?}','Data\DataController@hotelcitycode');
Route::get('/station/{id?}','Data\DataController@station');
Route::get('/airlines/{id?}','Data\DataController@airlines');
// 

// authenticate services

// geting packages cities
Route::get('/package/city/data/{id?}','Api\Holiday\HolidayApiController@packges');
Route::POST('/v1/package/search','Api\Holiday\HolidayApiController@searchpackges');

