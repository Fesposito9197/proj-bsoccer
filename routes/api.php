<?php

use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\PlayerController;
use App\Http\Controllers\Api\RatingController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\RoleController;
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

Route::get('players', [PlayerController::class, 'index']);
Route::get('players/{id}', [PlayerController::class, 'show']);
Route::get('roles', [RoleController::class, 'index']);
Route::post('messages/{player_id}', [MessageController::class, 'store']);
Route::post('reviews/{player_id}', [ReviewController::class, 'store']);
Route::post('ratings/{player_id}', [RatingController::class, 'store']);
