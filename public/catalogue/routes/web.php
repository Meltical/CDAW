<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\listeMediasController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

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

/* PAGES */

Route::get('template', function () {
    return view('template');
});

Route::get('/', 'listeMediasController@showListeMedias');

Route::get('/user/history', 'listeMediasController@showHistoryMedias')->middleware('auth');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::get('create', function () {
    return view('create');
});

Route::get('profile', function () {
    return view('profile');
})->middleware('auth');

Route::get('/details/{id}', 'listeMediasController@showMedia');


Route::get('listeMedias', [listeMediasController::class, 'showListeMedias']);

Route::delete('delete/{id}', [
    listeMediasController::class,
    'deleteMedia',
])->where(['id' => '^\d+$']);

Route::get('updateMedia/{id}', [
    listeMediasController::class,
    'showUpdateMedia',
])->where(['id' => '^\d+$']);

Route::post('updateMedia/{id}', [
    listeMediasController::class,
    'updateMedia',
])->where(['id' => '^\d+$']);

Route::get('addMedia', [listeMediasController::class, 'showAddMedia']);
Route::post('addMedia', [listeMediasController::class, 'addMedia']);

Route::get('media/{id}', [listeMediasController::class, 'showMedia'])->where([
    'id' => '^\d+$',
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* ********************************************** */

/* Helper */

Route::get('like/{id}', 'LikeController@likeService');
