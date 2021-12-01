<?php

use Illuminate\Support\Facades\Route;

Route::get('/{id}', 'MediasController@showMedia')->where(['id' => '^\d+$']);;

Route::get('create', 'MediasController@showCreateMedia')->name('medias.create');
Route::post('create', 'MediasController@createMedia');

Route::get('update/{id}', 'MediasController@showUpdateMedia');
Route::post('update/{id}', 'MediasController@updateMedia');

Route::delete('delete/{id}', 'MediasController@deleteMedia');
