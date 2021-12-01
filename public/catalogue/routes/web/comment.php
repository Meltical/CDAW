
<?php

use Illuminate\Support\Facades\Route;

Route::post('/create', 'CommentController@store')->middleware('auth')->name("comment.store");
Route::delete('/delete/{id}', 'CommentController@delete')->middleware('auth')->name("comment.delete");
