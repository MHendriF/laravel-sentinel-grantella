<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

//Route::get('/logout', 'Auth\LoginController@logout');
//Route::get('/', 'HomeController@index');

Route:: group(['middleware'  => 'visitors'], function() {
	Route::get('/register', 'RegisterController@register');
	Route::post('/register', 'RegisterController@postRegister');
	Route::get('/login', 'LoginController@login');
	Route::post('/login', 'LoginController@postLogin');
	
	Route::get('/activate/{email}/{activationCode}', 'ActivationController@activate');
	
	Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');
	Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword');
	Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');
	Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword');

});

Route:: group(['middleware' => 'authenticate'], function() {
	Route::get('/home', 'PageController@index');
	Route::post('/logout', 'LoginController@logout');
	Route::get('/profile', 'ProfileController@index');
});


Route:: group(['middleware' => 'admin'], function() {
	Route::get('/account', 'AdminController@index');
	Route::get('/room', 'RoomController@index');	
});

Route::get('/permission', 'ManagerController@index')->middleware('manager');

//API
get('/api/rooms', function () {
	return App\Room::all();
});
