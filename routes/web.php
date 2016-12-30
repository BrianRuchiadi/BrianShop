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

Route::get('/access/register', 'Authentication@getRegistration')->name('AuthenticationGetRegistration');
Route::post('/access/register', 'Authentication@postRegistration')->name('AuthenticationPostRegistration');

Route::post('/validation/username', 'Authentication@username')->name('AuthenticationUsername');

Route::get('checkingConnection',function(){
    if(DB::connection()){
        return "Connected";
    }else{
        return "Hello world";
    }
});