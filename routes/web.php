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
//Route::get('/Home', function () {
//    return view('home/index');
//});

Route::get('/admin', function () {
    return view('layouts/masterAdmin');
});
Route::get('/member', function () {
    return view('layouts/masterMember');
});
Route::get('/guest', function () {
    return view('layouts/masterGuest');
});



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search');
Route::get('/home/comment', 'HomeController@comment');
Route::post('/home', 'HomeController@store');
Route::get('/home/view/{id}', 'HomeController@view');
Route::get('/home/delete/{id}', 'HomeController@destroy');

Route::get('/profile/edit/{id}', 'ProfileControllers@edit');
Route::put('/profile', 'ProfileControllers@update');
Route::get('/profile/view/{id}', 'ProfileControllers@view');

Route::get('/inbox/massage', 'MessageControllers@massage');
Route::post('/inbox', 'MessageControllers@store');
Route::get('/inbox/view/{id}', 'MessageControllers@view');
Route::get('/inbox/delete/{id}', 'MessageControllers@destroy');

//Route::get('/home', 'MovieControllers@index');


