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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

/* ********************************************** */

/* Routes */

//Medias
Route::get('/', 'MediasController@showListeMedias')->name('home');

Route::get('/medias/{id}', 'MediasController@showMedia');

Route::get('medias/create', 'MediasController@showCreateMedia')->name('medias.create');
Route::post('medias/create', 'MediasController@createMedia');

Route::get('medias/update/{id}', 'MediasController@showUpdateMedia');
Route::post('medias/update/{id}', 'MediasController@updateMedia');

Route::delete('medias/delete/{id}', 'MediasController@deleteMedia');

//Playlists
Route::get('playlists', 'PlaylistController@showPlaylistsMedias')->middleware('auth')->name("playlists");
Route::get('createplaylistspage', 'PlaylistController@createPlaylistPage')->middleware('auth')->name("createplaylistpage");
Route::post('createplaylists', 'PlaylistController@createPlaylist')->middleware('auth')->name("createplaylist");
Route::get('user/playlists', 'PlaylistController@showMyPlaylistsMedias')->middleware('auth')->name("my_playlists");
Route::get('playlists/{id}', 'PlaylistController@showPlaylist');
Route::get('addtoplaylists/{id}', 'PlaylistController@addToPlaylistPage')->middleware('auth')->name("addToPlaylist");
Route::post('addtoplaylistmedia', 'PlaylistController@addMediaToPlaylist')->middleware('auth')->name("addToPlaylistMedia");

Route::get('history', 'HistoryController')->middleware('auth')->name("history");

Route::get('likes', 'MediasController@showLikedMedias')->middleware('auth')->name("likes");

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::get('profile', function () {
    return view('profile');
})->middleware('auth')->name("profile");


/* Helper */

Route::get('like/{id}', 'LikeController@likeService');
