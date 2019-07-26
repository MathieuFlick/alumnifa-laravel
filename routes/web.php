<?php

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

use App\Mail\ContactMessageCreated;

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('index');
    })->name('index');

    Route::group(['prefix' => 'auth', 'middleware' => 'guest', 'as' => 'auth.'], function () {
        // Login Routes
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');

        // Registration Routes
        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'Auth\RegisterController@register');
    });

    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('directory', 'DirectoryController@showView')->name('directory');
        Route::post('directory', 'DirectoryController@search')->name('directory.post');
        Route::get('directory/autocomplete', 'DirectoryController@getAutocomplete')->name('autocomplete');
    });


    Route::group(['prefix' => 'account', 'middleware' => ['auth', 'verified'], 'as' => 'account.'], function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/edit', 'AccountController@get')->name('editView');
        Route::post('/edit', 'AccountController@editPassword')->name('editView');
    });

    Route::group(['prefix' => 'messages', 'as' => 'messages.'], function () {
        Route::get('/', 'MessagesController@index')->name('index');
        Route::get('delete/{id}', 'MessagesController@deleteMessage')->name('delete');
        Route::get('conversations/{id}', 'MessagesController@reply')->name('conversations');
        Route::post('conversations/{id}', 'MessagesController@store');
        Route::get('read/{id}', 'MessagesController@read')->name('read');
        Route::get('sent/', 'MessagesController@sent')->name('sent');
        Route::get('sent/{id}', 'MessagesController@sentDelete')->name('sentDelete');
        Route::get('sent/read/{id}', 'MessagesController@sentRead')->name('sentRead');
        Route::get('write', 'MessagesController@writeMessage')->name('write');
        Route::post('write', 'MessagesController@storeWriteMessage');
        Route::get('autocomplete', 'MessagesController@getAutocomplete')->name('autocomplete');
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin', 'AdminController@get')->name('admin');
        Route::get('/admin/delete/{id}', 'AdminController@deleteUser')->name('deleteUser');
    });

    Route::get('logout', 'Auth\LoginController@logout')->name('account.logout');
    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('contact', 'ContactController@create')->name('contact');
    Route::post('contact', 'ContactController@store')->name('contact');
});
