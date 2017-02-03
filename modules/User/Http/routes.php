<?php

Route::group(['namespace' => 'Modules\User\Http\Controllers','middleware'=>'authSentinel'], function()
{
	Route::resource('users','UserController');
});
/**
 * Login routes
 */
Route::group(['namespace' => 'Modules\User\Http\Controllers'], function()
{
	Route::get('login', 'AuthSentinelController@login');
	Route::post('login', 'AuthSentinelController@processLogin');
	Route::get('logout', 'AuthSentinelController@logout');
	Route::get('auth/confirm/email/{email}/confirm_token/{confirm_token}', 'UserController@confirmRegister');
});


