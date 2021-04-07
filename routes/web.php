<?php

use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('tweets', [TweetController::class, 'index'])->name('tweets.index')->middleware('auth');
Route::post('tweets', [TweetController::class, 'store'])->name('tweets.store')->middleware('auth');

Route::get('profile/{user:username}', [ProfileController::class, 'show'])->name('profile');

Route::post('profile/{user:username}/follow', [FollowController::class, 'store'])->name('follow')->middleware('auth');

Route::get('profile/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::patch('profile/{user:username}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('explore', [ExploreController::class, 'index'])->middleware('auth');
