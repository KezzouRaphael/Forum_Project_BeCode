<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\RegisterController;



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();});



Route::post('login', [AuthUserController::class, 'login']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthUserController::class, 'user']);
    Route::get('logout', [AuthUserController::class, 'logout']);

    Route::get('forums/create', [ForumController::class, 'create']);
    Route::post('forums/store', [ForumController::class, 'store']);
    Route::put('forums/edit', [ForumController::class, 'edit']);
    Route::delete('forums/delete', [ForumController::class, 'delete']);

    Route::post('board/create', [BoardController::class, 'create']);
    Route::put('board/edit', [BoardController::class, 'edit']);
    Route::delete('board/delete', [BoardController::class, 'delete']);
});

Route::get('board/board', [BoardController::class, 'board']);
Route::get('forums/forum', [ForumController::class, 'forum']);
