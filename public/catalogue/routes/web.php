<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', 'MediasController@showListeMedias')->name('home');

//Media
Route::get('/media/{id}', 'MediasController@showMedia')->where(['id' => '^\d+$']);;
Route::get('/media/create', 'MediasController@showCreateMedia')->middleware('auth')->name('media.create');
Route::get('/media/update/{id}', 'MediasController@showUpdateMedia')->middleware('auth');

Route::post('/media/update/{id}', 'MediasController@updateMedia')->middleware('auth');
Route::post('/media/create', 'MediasController@createMedia')->middleware('auth');

Route::delete('/media/delete/{id}', 'MediasController@deleteMedia')->middleware('auth');


//Playlist
Route::get('/playlist', 'PlaylistController@showPlaylistsMedias')->middleware('auth')->name("playlists");
Route::get('/playlist/create', 'PlaylistController@createPlaylistPage')->middleware('auth')->name("createplaylist");
Route::get('/playlist/user', 'PlaylistController@showMyPlaylistsMedias')->middleware('auth')->name("my_playlists");
Route::get('/playlist/{id}', 'PlaylistController@showPlaylist');
Route::get('/playlist/add/{id}', 'PlaylistController@addToPlaylistPage')->middleware('auth')->name("addToPlaylist");

Route::post('/playlist/add', 'PlaylistController@addMediaToPlaylist')->middleware('auth')->name("addToPlaylistMedia");
Route::post('/playlist/create', 'PlaylistController@createPlaylist')->middleware('auth')->name("createplaylist");


//Like
Route::get('/like/{id}', 'LikeController@likeService')->middleware('auth');
Route::get('/like', 'MediasController@showLikedMedias')->middleware('auth')->name("like");

Route::get('history', 'HistoryController')->middleware('auth')->name("history");

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::get('profile', function () {
    return view('profile');
})->middleware('auth')->name("profile");
