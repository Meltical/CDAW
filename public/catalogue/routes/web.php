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

Route::get('name/{firstname?}/{lastname?}', function ($firstname="Victor", $lastname="Deliege") {
    return 'Hello ' .$firstname . " " .$lastname;
});

Route::get('movie/{title}', function ($title) {
    return "The title of the movie is : " .$title;
})->where(['title' => '[A-Za-z]+']);
