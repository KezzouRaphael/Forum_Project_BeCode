<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;

 

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();});



Route::get('login',[AuthUserController::class,'login']);
 

Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',[AuthUserController::class,'user']);
    Route::get('logout',[AuthUserController::class,'logout']);
});
