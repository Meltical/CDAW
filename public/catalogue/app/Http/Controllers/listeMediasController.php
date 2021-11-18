<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class listeMediasController extends Controller
{
    public function getListeMedias() {
        return view('listFilms');
    }
}
