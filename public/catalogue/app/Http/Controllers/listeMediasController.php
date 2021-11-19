<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class listeMediasController extends Controller
{
    public function showListeMedias() {
        $medias = Media::with("category")->get();
        echo "<script>console.log('Debug Objects: " . $medias . "' );</script>";
        $data = [
            "medias" => $medias,
        ];
        return view('listemedias')->with('data', $data);
    }

    public function showAddMedia() {
        return view('addmedia');
    }

    public function addMedia(Request $request){
        $title = $request->input('title');

        $data = [
            'title' => $title
        ];

        $id = Media::create($data);

        return redirect("/media/{$id}");
    }
}
