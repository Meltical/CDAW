<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Like;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

class listeMediasController extends Controller
{
    public function showListeMedias()
    {
        $medias = Media::all();
        return view('home')->with('medias', $medias);
    }

    public function showAddMedia()
    {
        $categories = category::all();
        return view('addmedia')->with('categories', $categories);
    }

    public function showUpdateMedia($id)
    {
        $categories = category::all();
        $media = Media::getWithCategory($id)->firstOrFail();
        $data = [
            "categories" => $categories,
            "media" => $media,
        ];
        return view('updatemedia')->with('data', $data);
    }

    public function addMedia(Request $request)
    {
        $title = $request->input('titleMedia');
        $description = $request->input('descriptionMedia');
        $imageUrl = $request->input('imageUrl');
        $category = $request->input('category');

        $data = [
            'title' => $title,
            'description' => $description,
            'image' => $imageUrl,
            'category_id' => $category,
        ];

        $id = Media::create($data);

        return redirect("/media/{$id}");
    }

    public static function updateMedia(Request $request, $id)
    {
        $title = $request->input('titleMedia');
        $description = $request->input('descriptionMedia');
        $imageUrl = $request->input('imageUrl');
        $category = $request->input('category');

        $data = [
            'title' => $title,
            'description' => $description,
            'image' => $imageUrl,
            'category_id' => $category,
        ];

        Media::whereId($id)->update($data);

        return redirect("/media/{$id}");
    }

    public function showMedia($id)
    {
        $loggedUser = Auth::user();
        $media = Media::findOrFail($id);
        if ($loggedUser) {
            $userId = $loggedUser->id;
            $likedMedia = Like::select('*')
                ->where('media_id', '=', $id)
                ->where('user_id', '=', $userId)
                ->get();
            if (count($likedMedia)) {
                return view('details')->with('media', $media)->with('isLiked', true);
            } else {
                return view('details')->with('media', $media)->with('isLiked', false);
            }
        }
        return view('details')->with('media', $media)->with('isLiked', false);
    }

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id); //TODO: Support errors
        $media->delete();
        $medias = Media::with("category")->get();
        return view('listemedias')->with('medias', $medias);
    }
}
