<?php

use Illuminate\Support\Facades\Route;

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

Route::get('bootstrap', function () {
    return view("bootstrap");
});

Route::get('media/{id}', function ($id) {
    return "The title of the movie is : " . $id;
})->where(['id' => '^\d+$']);

Route::get('media/{id}', 'App\Http\controllers\listeMediasController@showMedia')->where(['id' => '^\d+$']);
Route::get('listeMedias', 'App\Http\controllers\listeMediasController@showListeMedias');

Route::get('addMedia', 'App\Http\controllers\listeMediasController@showAddMedia');
Route::post('addMedia', 'App\Http\controllers\listeMediasController@addMedia');

Route::get('updateMedia/{id}', 'App\Http\controllers\listeMediasController@showUpdateMedia')->where(['id' => '^\d+$']);
Route::post('updateMedia/{id}', 'App\Http\controllers\listeMediasController@updateMedia')->where(['id' => '^\d+$']);

Route::delete('delete/{id}', 'App\Http\controllers\listeMediasController@deleteMedia')->where(['id' => '^\d+$']);
