<?php

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    return response()->json(['success' => true]);
});

Route::post('auth', 'AuthController@makeAppLogin');

Route::middleware('auth:api')->group(function () {
    Route::apiResource('doctors', 'API\DoctorController');
});
