<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('tweets', [TweetController::class, 'index'])->name('tweets.index');
Route::post('tweets', [TweetController::class, 'store'])->name('tweets.store');

Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile');
