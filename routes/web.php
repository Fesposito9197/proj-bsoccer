<?php

use App\Http\Controllers\Admin\PlayerController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\StarController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('players', PlayerController::class);
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::delete('/stars/{star}', [StarController::class, 'destroy'])->name('stars.destroy');
});

require __DIR__.'/auth.php';
