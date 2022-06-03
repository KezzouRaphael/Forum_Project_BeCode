<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\PostController;



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {return $request->user();});





//user
Route::get('login', [AuthUserController::class, 'login']);
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');




Route::middleware('auth:sanctum')->group(function () {

    //user
    Route::get('user', [AuthUserController::class, 'user']);
    Route::get('logout', [AuthUserController::class, 'logout']);

    //forums
    Route::get('forums/create', [ForumController::class, 'create']);
    Route::post('forums/store', [ForumController::class, 'store']);
    Route::put('forums/edit', [ForumController::class, 'edit']);
    Route::delete('forums/delete', [ForumController::class, 'delete']);

    //topic
    Route::get('topics/create', [TopicController::class, 'create']);
    Route::post('topics/store', [TopicController::class, 'store']);
    Route::put('topics/edit', [TopicController::class, 'edit']);
    Route::delete('topics/delete', [TopicController::class, 'delete']);

    //board
    Route::post('board/create', [BoardController::class, 'create']);
    Route::put('board/edit', [BoardController::class, 'edit']);
    Route::delete('board/delete', [BoardController::class, 'delete']);

    //post
    Route::post('post/create', [PostController::class, 'create']);
    Route::put('post/edit', [PostController::class, 'edit']);
    Route::delete('post/delete', [PostController::class, 'delete']);
});
//board
Route::get('board/boards', [BoardController::class, 'boards']);
Route::get('board/board', [BoardController::class, 'board']);

//post
Route::get('post/boards', [PostController::class, 'boards']);
Route::get('post/board', [PostController::class, 'board']);

Route::get('board/board', [BoardController::class, 'board']);
Route::get('forums/forum', [ForumController::class, 'forum']);
Route::get('topics/topic', [TopicController::class, 'topic']);
