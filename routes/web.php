<?php

use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('tweets', [TweetController::class, 'index'])->name('home');
    Route::post('tweets', [TweetController::class, 'store'])->name('tweets');
});
