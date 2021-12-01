<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediasController;
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
    MediasController::class,
    'deleteMedia',
])->where(['id' => '^\d+$']);

Route::get('updateMedia/{id}', [
    MediasController::class,
    'showUpdateMedia',
])->where(['id' => '^\d+$']);

Route::post('updateMedia/{id}', [
    MediasController::class,
    'updateMedia',
])->where(['id' => '^\d+$']);

Route::get('addMedia', [MediasController::class, 'showAddMedia']);
Route::post('addMedia', [MediasController::class, 'addMedia']);

Route::get('media/{id}', [MediasController::class, 'showMedia'])->where([
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

Route::get('/', 'MediasController@showListeMedias')->name('home');

Route::get('medias/create', 'MediasController@showCreateMedia')->name('medias.create');
Route::post('medias/create', 'MediasController@createMedia');
Route::delete('medias/delete/{id}', 'MediasController@deleteMedia');

Route::get('playlists', 'PlaylistController@showPlaylistsMedias')->middleware('auth')->name("playlists");
Route::get('createplaylistspage', 'PlaylistController@createPlaylistPage')->middleware('auth')->name("createplaylistpage");
Route::post('createplaylists', 'PlaylistController@createPlaylist')->middleware('auth')->name("createplaylist");
Route::get('user/playlists', 'PlaylistController@showMyPlaylistsMedias')->middleware('auth')->name("my_playlists");
Route::get('playlists/{id}', 'PlaylistController@showPlaylist');

Route::get('history', 'HistoryController')->middleware('auth')->name("history");

Route::get('likes', 'MediasController@showLikedMedias')->middleware('auth')->name("likes");

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::get('profile', function () {
    return view('profile');
})->middleware('auth')->name("profile");

Route::get('/details/{id}', 'MediasController@showMedia');

Route::get('listeMedias', [MediasController::class, 'showListeMedias']);

/* Helper */

Route::get('like/{id}', 'LikeController@likeService');
