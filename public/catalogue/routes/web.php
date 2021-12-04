<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', 'MediasController@showListeMedias')->name('home');

//Media
Route::get('/media/{id}', 'MediasController@showMedia')->where(['id' => '^\d+$'])->name('media.show');;
Route::get('/media/create', 'MediasController@showCreateMedia')->middleware('role:Moderator')->name('media.create');
Route::get('/media/update/{id}', 'MediasController@showUpdateMedia')->where(['id' => '^\d+$'])->middleware('role:Moderator');

Route::get('/media/search', 'MediasController@search')->name('media.search');
Route::post('/media/update/{id}', 'MediasController@updateMedia')->where(['id' => '^\d+$'])->middleware('role:Moderator');
Route::post('/media/create', 'MediasController@createMedia')->middleware('role:Moderator');

Route::delete('/media/delete/{id}', 'MediasController@deleteMedia')->where(['id' => '^\d+$'])->middleware('role:Moderator');


//Playlist
Route::get('/playlist', 'PlaylistController@showPlaylistsMedias')->middleware('auth')->name("playlists");
Route::get('/playlist/create', 'PlaylistController@createPlaylistPage')->middleware('auth')->name("createplaylist");
Route::get('/playlist/user', 'PlaylistController@showMyPlaylistsMedias')->middleware('auth')->name("my_playlists");
Route::get('/playlist/{id}', 'PlaylistController@showPlaylist')->where(['id' => '^\d+$'])->middleware('auth');
Route::get('/playlist/add/{id}', 'PlaylistController@addToPlaylistPage')->where(['id' => '^\d+$'])->middleware('auth')->name("addToPlaylist");

Route::post('/playlist/add', 'PlaylistController@addMediaToPlaylist')->middleware('auth')->name("addToPlaylistMedia");
Route::post('/playlist/create', 'PlaylistController@createPlaylist')->middleware('auth')->name("createplaylist");


//Like
Route::get('/like/{id}', 'LikeController@likeService')->where(['id' => '^\d+$'])->middleware('auth');
Route::get('/like', 'MediasController@showLikedMedias')->middleware('auth')->name("like");


//Comment
Route::post('/create', 'CommentController@store')->middleware('auth')->name("comment.store");

Route::delete('/delete/{id}', 'CommentController@delete')->where(['id' => '^\d+$'])->middleware('role:Moderator')->name("comment.delete");


//Other
Route::get('history', 'HistoryController')->middleware('auth')->name("history");
Route::get('history/{id}', 'HistoryController@store')->where(['id' => '^\d+$'])->middleware('auth')->name("history.store");

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::get('profile', function () {
    return view('profile');
})->middleware('auth')->name("profile");

Route::put('updateprofile', 'UserController@putUpdateUser')->middleware('auth')->name("putprofileupdate");
Route::get('updateprofile', 'UserController@showUpdateUser')->middleware('auth')->name("showprofileupdate");
