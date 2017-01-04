<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
Route::get('/access/register', 'Authentication@getRegistration')->name('AuthenticationGetRegistration');
Route::post('/access/register', 'Authentication@postRegistration')->name('AuthenticationPostRegistration');
Route::match(['get','post'], '/access/login', 'Authentication@login')->name('AuthenticationLogin');
*/

Route::post('/validation/username', 'Authentication@username')->name('AuthenticationUsername');

Route::get('checkingConnection',function(){
    if(DB::connection()){
        return "Connected";
    }else{
        return "Hello world";
    }
});

Route::Auth();

Route::get('/home', 'HomeController@index');

Route::group( ['prefix' => 'user'], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('user.logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    // END OF USERS GROUP
});
    
Route::group( ['prefix' => 'admin'] , function() {
        // ADMIN GROUP
    Route::get('login', 'AdminAuth\LoginController@showLoginForm')->name('admins.login');
    Route::post('login', 'AdminAuth\LoginController@login');
    Route::post('logout', 'AdminAuth\LoginController@logout')->name('admins.logout');

    // Registration Routes...
    Route::get('register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admins.register');
    Route::post('register', 'AdminAuth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
    Route::post('password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
    Route::get('password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
    Route::post('password/reset', 'AdminAuth\ResetPasswordController@reset');
   });






