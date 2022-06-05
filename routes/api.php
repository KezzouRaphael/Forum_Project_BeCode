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


//board
Route::get('board/boards', [BoardController::class, 'boards']);
Route::get('board/board/{id}', [BoardController::class, 'board']);

 
// forum
Route::get('forums/forum/{id}', [ForumController::class, 'forum']);
Route::get('forums/forums', [ForumController::class, 'forums']);

// topic
Route::get('topics/topic/{id}', [TopicController::class, 'topic']);
Route::get('topics/topics', [TopicController::class, 'topics']);

//post
Route::post('post/post/{id}', [PostController::class, 'create']);
Route::put('post/posts', [PostController::class, 'edit']);





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
    Route::post('board/create', [BoardController::class, 'create']);
    Route::put('board/edit/{id}', [BoardController::class, 'edit']);
    Route::delete('board/delete/{id}', [BoardController::class, 'delete']);

    //post
    Route::post('post/create', [PostController::class, 'create']);
    Route::put('post/edit/{id}', [PostController::class, 'edit']);
    Route::delete('post/delete/{id}', [PostController::class, 'delete']);


});





 



