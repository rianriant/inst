<?php

use App\Http\Controllers\FollowsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;



Auth::routes();

Route::get('/', [PostsController::class, 'index']);

Route::get('/p/create', [PostsController::class, 'create']);

Route::get('/p/{post}', [PostsController::class, 'show']);

Route::get(
    '/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index']
)->name('profile.show');

Route::get(
    '/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit']
);

Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update']);

Route::post('/p', [PostsController::class, 'store']);

Route::post('/follow/{user}', [FollowsController::class, 'store']);

