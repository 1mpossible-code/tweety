<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('tweets', [\App\Http\Controllers\TweetController::class, 'store'])->name('tweets');
