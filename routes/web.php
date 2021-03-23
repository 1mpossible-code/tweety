<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('tweets', [TweetController::class, 'index'])->name('tweets.index');
Route::post('tweets', [TweetController::class, 'store'])->name('tweets.store');

Route::get('profile/{user:name}', [ProfileController::class, 'show'])->name('profile');
Route::post('profile/{user:name}/follow', [FollowController::class, 'store'])->name('follow');

Route::get('profile/{user:name}/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
