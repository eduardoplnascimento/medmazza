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
    Route::get('/appointments/load', 'AppointmentController@load')->name('appointments.load');
    Route::get('/appointments/doctor/load', 'AppointmentController@loadDoctor')->name('appointments.doctor.load');
    Route::get('/appointments/cancel/{id}', 'AppointmentController@cancel')->name('appointments.cancel');
    Route::resource('appointments', 'AppointmentController');
    Route::get('/doctors/available', 'DoctorController@getAvailableByDate')->name('doctors.available');
    Route::resource('doctors', 'DoctorController');
    Route::get('/users/history', 'UserController@history')->name('users.history');
});
