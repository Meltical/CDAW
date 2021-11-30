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

Route::get('create', function () {
    return view('create');
});

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

/* Routes */

Route::get('template', function () {
    return view('template');
});

Route::get('/', 'listeMediasController@showListeMedias');

Route::get('playlists', 'listeMediasController@showPlaylistsMedias')->middleware('auth')->name("playlists");
Route::get('user/playlists', 'listeMediasController@showMyPlaylistsMedias')->middleware('auth')->name("my_playlists");
Route::get('playlists/{id}', 'listeMediasController@showPlaylist');

Route::get('history', 'listeMediasController@showHistoryMedias')->middleware('auth')->name("history");

Route::get('likes', 'listeMediasController@showLikedMedias')->middleware('auth')->name("likes");

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::get('profile', function () {
    return view('profile');
})->middleware('auth')->name("profile");

Route::get('/details/{id}', 'listeMediasController@showMedia');

Route::get('listeMedias', [listeMediasController::class, 'showListeMedias']);

/* Helper */

Route::get('like/{id}', 'LikeController@likeService');
