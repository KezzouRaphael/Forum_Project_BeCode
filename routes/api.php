<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\RegisterController;



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();});



Route::get('login', [AuthUserController::class, 'login']);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthUserController::class, 'user']);
    Route::get('logout', [AuthUserController::class, 'logout']);
});
