<?php

Auth::routes();
Route::get('/logout', 'HomeController@logout');

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

Route::get('/bookmark/view/{id}', 'BookmarkController@save');
Route::get('/bookmark/show', 'BookmarkController@show');
Route::get('/bookmark/delete/{id}', 'BookmarkController@destroy');

Route::get('/manage/user', 'AdminControllers@manage_user');
Route::get('/manage/adduser', 'AdminControllers@add_user');
Route::post('/adduser', 'AdminControllers@store_user');
Route::get('/manage/updateuser/{id}', 'AdminControllers@edit_user');
Route::put('/manage/updateuser', 'AdminControllers@update_user');
Route::get('/manage/delete/{id}', 'AdminControllers@destroy');

Route::get('/manage/movie', 'MovieControllers@manage_movie');
Route::get('/manage/addmovie', 'MovieControllers@add_movie');
Route::post('/addmovie', 'MovieControllers@store_movie');
Route::get('/manage/updatemovie/{id}', 'MovieControllers@edit_movie');
Route::put('/manage/updatemovie', 'MovieControllers@update_movie');
Route::get('/manage/deletemovie/{id}', 'MovieControllers@destroy');

Route::get('/manage/genre', 'GenreControllers@manage_genre');
Route::get('/manage/addgenre', 'GenreControllers@add_genre');
Route::post('/addgenre', 'GenreControllers@store_genre');
Route::get('/manage/updategenre/{id}', 'GenreControllers@edit_genre');
Route::put('/manage/updategenre', 'GenreControllers@update_genre');
Route::get('/manage/deletegenre/{id}', 'GenreControllers@destroy');
