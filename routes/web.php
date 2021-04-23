<?php

use App\Http\Controllers\FollowerController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\TweetLikeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::redirect('/', 'login');

Route::middleware('auth')->group(function () {
    Route::get('password/{user:username}/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
    Route::post('password/{user:username}/update', [UpdatePasswordController::class, 'store'])->name('password.update');

    Route::get('tweets', [TweetController::class, 'index'])->name('tweets.index');
    Route::post('tweets', [TweetController::class, 'store'])->name('tweets.store');
    Route::delete('tweets/{tweet}', [TweetController::class, 'destroy'])->name('tweets.destroy');
    Route::get('tweets/{tweet}', [TweetController::class, 'show'])->name('tweets.show');

    Route::post('tweets/{tweet}/reply', [ReplyController::class, 'store'])->name('reply.store');
    Route::delete('replies/{reply}', [ReplyController::class, 'destroy'])->name('reply.destroy');

    Route::post('tweets/{tweet}/like', [TweetLikeController::class, 'store'])->name('tweetLike.store');
    Route::delete('tweets/{tweet}/dislike', [TweetLikeController::class, 'destroy'])->name('tweetLike.destroy');


    Route::post('profile/{user:username}/follow', [FollowController::class, 'store'])->name('follow');

    Route::get('profile/{user:username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/{user:username}', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('explore', [ExploreController::class, 'index'])->name('explore.index');

    Route::get('notifications', [NotificationsController::class, 'index'])->name('notifications.index');
});

Route::get('profile/{user:username}', [ProfileController::class, 'show'])->name('profile');
Route::get('profile/{user:username}/following', [FollowController::class, 'index'])->name('follow.index');
Route::get('profile/{user:username}/followers', [FollowerController::class, 'index'])->name('follower.index');
