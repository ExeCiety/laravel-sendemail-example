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

Route::group(['api' => 'ApiSendMailController'], function() {

	//Method GET Request
	Route::get('/send/mail/feedback', 'ApiSendMailController@send_feedback')->name('api.send.feedback');

	//Method POST Request
	Route::post('/send/mail/feedback', 'ApiSendMailController@send_feedback')->name('api.send.feedback');

	//You Can Add more Method Request
	
});
