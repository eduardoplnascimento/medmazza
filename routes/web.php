<?php

Route::get('/', 'HomeController@index')->name('index');
Route::get('/signin', 'HomeController@signin')->name('login');
Route::get('/signup', 'HomeController@signup')->name('register');
Route::post('/signin', 'AuthController@signin')->name('signin');
Route::post('/signup', 'AuthController@signup')->name('signup');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('users', 'UserController')->only(['update', 'edit']);
    Route::resource('appointments', 'AppointmentsController');
    Route::resource('doctors', 'DoctorsController');
    Route::get('/users/history', 'UserController@history')->name('users.history');
});
