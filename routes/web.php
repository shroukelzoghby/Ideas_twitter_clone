<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


Route::get('', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('ideas', IdeaController::class)
    ->except('index','create','show')
    ->middleware('auth');

Route::resource('ideas', IdeaController::class)
    ->only('show');

Route::resource('ideas.comments', CommentController::class)
    ->only('store')
    ->middleware('auth');

Route::resource('users', userController::class)
    ->only('show');

Route::resource('users', userController::class)
    ->only('edit','update')
    ->middleware('auth');

Route::get('profile',[userController::class,'profile'])
    ->name('profile')
    ->middleware('auth');

Route::post('users/{user}/follow',[FollowerController::class,'follow'])
    ->name('users.follow')
    ->middleware('auth');
Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])
    ->name('users.unfollow')
    ->middleware('auth');


Route::post('ideas/{idea}/like',[IdeaLikeController::class,'like'])
    ->name('ideas.like')
    ->middleware('auth');
Route::post('ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])
    ->name('ideas.unlike')
    ->middleware('auth');

Route::get('/terms',function (){
    return view('terms');
})->name('terms');
