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
Route::post('register', [RegisterController::class, 'create']);


 //board
Route::get('boards', [BoardController::class, 'boards']);
Route::get('boards/{id}', [BoardController::class, 'board']);

 
// forum
Route::get('forums/{id}', [ForumController::class, 'forum']);
//! Route::get('board/{id}/forums', [ForumController::class, 'forums']);
Route::get('board/{id}/forums', [ForumController::class, 'forums']);

// topic
Route::get('topics/{id}', [TopicController::class, 'topic']);
//! Route::get('topics', [TopicController::class, 'topics']);
Route::get('forum/{id}/topics', [TopicController::class, 'topics']);

//post
Route::get('posts/{id}', [PostController::class, 'post']);
//!Route::get('posts', [PostController::class, 'posts']);
Route::get('topic/{id}/posts', [PostController::class, 'posts']);

 


Route::middleware('auth:sanctum')->group(function () {

    //user
    Route::get('user', [AuthUserController::class, 'user']);
    Route::get('logout', [AuthUserController::class, 'logout']);

    // forum
    Route::get('forums/create', [ForumController::class, 'create']);
    Route::put('forums/edit/{id}', [ForumController::class, 'edit']);
    Route::delete('forums/delete/{id}', [ForumController::class, 'delete']);
    
    // topic
    Route::get('topics/create', [TopicController::class, 'create']);
    Route::put('topics/edit/{id}', [TopicController::class, 'edit']);
    Route::delete('topics/delete/{id}', [TopicController::class, 'delete']);

    // board
    Route::post('boards/create', [BoardController::class, 'create']);
    Route::put('boards/edit/{id}', [BoardController::class, 'edit']);
    Route::delete('boards/delete/{id}', [BoardController::class, 'delete']);

    //post
    Route::post('posts/create', [PostController::class, 'create']);
    Route::put('posts/edit/{id}', [PostController::class, 'edit']);
    Route::delete('posts/delete/{id}', [PostController::class, 'delete']);


});


