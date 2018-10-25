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

// Route::group(['middleware' => 'auth:api'], function() {
	
	Route::get('rooms',          'Api\RoomController@all');
	Route::get('rooms/{id}',     'Api\RoomController@get');
	Route::post('rooms',         'Api\RoomController@add');
	Route::put('rooms/{id}',     'Api\RoomController@edit');
    Route::delete('rooms/{id}',  'Api\RoomController@delete');

	Route::post('rooms/search',     'Api\RoomController@search');
	Route::get('rooms/{id}/check', 	'Api\RoomController@check');
	Route::get('rooms/{id}/detail',	'Api\RoomController@detail');
    
// });
