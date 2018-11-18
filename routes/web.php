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

Route::get('/', 'HomeController@index')->name('home.index');

Auth::routes(['register' => false, 'verify' => false]);

/* ****************
* Logged on users *
**************** */
Route::group(['middleware' => ['auth']], function () {
    /* ****************
    * Administration *
    **************** */
    Route::group(['prefix' => '', 'as' => '', 'middleware' => ['admin']], function () {
        Route::get('/dashboard', 'HomeController@dashboard')->name('home.dashboard');
        Route::resource('newsletter_subscribers', 'NewsletterSubscriberController')->except('show');
    });
});