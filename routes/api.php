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
    Route::post('forums/create', [ForumController::class, 'create']);
    Route::put('forums/edit', [ForumController::class, 'edit']);
    Route::delete('forums/delete', [ForumController::class, 'delete']);

    //topic
    Route::post('topics/create', [TopicController::class, 'create']);
    Route::put('topics/edit', [TopicController::class, 'edit']);
    Route::delete('topics/delete', [TopicController::class, 'delete']);

    //board
    Route::post('boards/create', [BoardController::class, 'create']);
    Route::put('boards/edit', [BoardController::class, 'edit']);
    Route::delete('boards/delete', [BoardController::class, 'delete']);

    //post
    Route::post('posts/create', [PostController::class, 'create']);
    Route::put('posts/edit', [PostController::class, 'edit']);
    Route::delete('posts/delete', [PostController::class, 'delete']);
});
//board
Route::get('boards/{id}', [BoardController::class, 'board']);
Route::get('boards', [BoardController::class, 'boards']);

//post
Route::get('posts/{id}', [PostController::class, 'post']);
Route::get('posts', [PostController::class, 'posts']);

//forum
Route::get('forums/{id}', [ForumController::class, 'forum']);
Route::get('forums', [ForumController::class, 'forums']);

//topic
Route::get('topics/{id}', [TopicController::class, 'topic']);
Route::get('topics', [TopicController::class, 'topics']);
