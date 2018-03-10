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

Route::get('/', 'EventController@index');

Route::get('/loginregis', function () {
    return view('loginregis');
});

Route::resource('admin', 'AdminController');
Route::resource('category', 'CategoryController');
Route::resource('eo', 'EOController');
Route::resource('event', 'EventController');
Route::resource('eventImage', 'EventImageController');
Route::resource('savedEvent', 'SavedEventController');
Route::resource('ticket', 'TicketController');
Route::resource('basicUser', 'BasicUserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('verify', 'EOController@verify')->name('eo.verify');
