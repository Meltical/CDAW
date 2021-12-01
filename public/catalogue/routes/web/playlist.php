<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PlaylistController@showPlaylistsMedias')->middleware('auth')->name("playlists");
Route::get('create', 'PlaylistController@createPlaylistPage')->middleware('auth')->name("createplaylist");
Route::get('user', 'PlaylistController@showMyPlaylistsMedias')->middleware('auth')->name("my_playlists");
Route::get('/{id}', 'PlaylistController@showPlaylist');
Route::get('add/{id}', 'PlaylistController@addToPlaylistPage')->middleware('auth')->name("addToPlaylist");

Route::post('add', 'PlaylistController@addMediaToPlaylist')->middleware('auth')->name("addToPlaylistMedia");
Route::post('create', 'PlaylistController@createPlaylist')->middleware('auth')->name("createplaylist");
