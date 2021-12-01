
<?php

use Illuminate\Support\Facades\Route;

Route::get('{id}', 'LikeController@likeService')->middleware('auth');
Route::get('/', 'MediasController@showLikedMedias')->middleware('auth')->name("like");
