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

Route::match(['get','post'], '/Access/Register', 'Authentication@Registration')->name('AuthenticationRegistration');
Route::post('/Validation/Username', 'Authentication@Username')->name('AuthenticationUsername');

Route::get('checkingConnection',function(){
    if(DB::connection()){
        return "Connected";
    }else{
        return "Hello world";
    }
});