<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BoardController;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();});





//user
Route::get('login', [AuthUserController::class, 'login']);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

//board
Route::get('board/boards', [BoardController::class, 'boards']);
Route::get('board/board', [BoardController::class, 'board']);

Route::middleware('auth:sanctum')->group(function () {

    //user
    Route::get('user', [AuthUserController::class, 'user']);
    Route::get('logout', [AuthUserController::class, 'logout']);
    
    //board
    Route::post('board/create', [BoardController::class, 'create']);
    Route::put('board/edit', [BoardController::class, 'edit']);
    Route::delete('board/delete', [BoardController::class, 'delete']);

});


