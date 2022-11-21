<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\PeoplelistController;
use App\Http\Controllers\Api\PolllistController;
use App\Http\Controllers\Api\User\Follower\FollowerController;
use App\Http\Controllers\Api\User\Poll\PollattendanceController;
use App\Http\Controllers\Api\User\Poll\PolloptionController;
use App\Http\Controllers\Api\User\Post\PostController;
use App\Http\Controllers\Api\User\Post\PostlikeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function(){
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::middleware('auth:sanctum')->group(function(){
        Route::post('post/store', [PostController::class, 'store']);
        Route::post('post/like/{id}', [PostlikeController::class, 'postLike']);
        // Poll
        Route::post('poll/option/attendance/{id}', [PollattendanceController::class, 'pollStore']);
        // Follow
        Route::post('follow/{id}', [FollowerController::class, 'followRequest']);
        Route::get('/follow/suggestion', [PeoplelistController::class, 'suggestionPeople']);

    });
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'singlePost']);
Route::get('/polls', [PolllistController::class, 'index']);
Route::get('/poll/option/{id}', [PolloptionController::class, 'pollOptionById']);
// Folling People
Route::get('/people', [PeoplelistController::class, 'index']);
Route::get('/people/{id}', [PeoplelistController::class, 'singlePeople']);
