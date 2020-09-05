<?php

use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    return response()->json(['success' => true]);
});

Route::post('auth', 'AuthController@makeAppLogin');

Route::get('/teste', function (Request $request) {
    $user = auth()->user();

    return response()->json($user);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
