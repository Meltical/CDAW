<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', 'MediasController@showListeMedias')->name('home');

Route::prefix('/media')->group(__DIR__ . '/web/media.php');
Route::prefix('/playlist')->group(__DIR__ . '/web/playlist.php');
Route::prefix('/like')->group(__DIR__ . '/web/like.php');
Route::prefix('/comment')->group(__DIR__ . '/web/comment.php');

Route::get('history', 'HistoryController')->middleware('auth')->name("history");

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::get('profile', function () {
    return view('profile');
})->middleware('auth')->name("profile");
