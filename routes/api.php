<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::apiResource('/type', 'App\Http\Controllers\TypeController');
// Route::apiResource('type/{typeId}/event', 'App\Http\Controllers\EventController');
// Route::apiResource('type/{typeId}/event/comment', 'App\Http\Controllers\CommentController');
// Route::apiResource('/user', 'App\Http\Controllers\UserController');

Route::resource('types', 'App\Http\Controllers\TypeController');
Route::resource('types.events', 'App\Http\Controllers\EventController');
Route::resource('types.events.comments', 'App\Http\Controllers\CommentController');
