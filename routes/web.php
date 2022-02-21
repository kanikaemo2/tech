<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('principal_section.index');
});

Route::get('/includeme', function () {
    return view('principal_section.includeme');
});

//This only gonna load when they are not logued, if they are logghed they are not gonna load, i guess.
Route::group(['middleware' => ['guest']], function() {
    //Here we load the login normally
    Route::get('/register', 'RegisterController@show')->name('register.show');
    //With this we send the insert
    Route::post('/register', 'RegisterController@register')->name('register.perform');

    //Login
    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');
});

//Routes when the user is logged in.
Route::group(['middleware' => ['auth']], function() {
    //To log out.
    Route::get('/logout', 'LogOutController@perform')->name('logout.perform');
        /**
         * Verification Routes
         */
    Route::get('/email/verify', 'MailoVerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'MailoVerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'MailoVerificationController@resend')->name('verification.resend');
});
