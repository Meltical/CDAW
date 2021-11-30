<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Tag;
use App\Models\category;
use App\Models\History;
use Illuminate\Http\Request;

class listeMediasController extends Controller
{
    public function showListeMedias()
    {
        $medias = Media::all();
        return view('home')->with('medias', $medias)->with('title', "Curated For You");
    }

    public function showHistoryMedias()
    {
        $userId = auth()->user()->id;
        $medias = History::where("user_id", "=", $userId)
            ->join("medias", "medias.id", "=", "history.media_id")
            ->orderBy("history.created_at", "desc")
            ->get();
        return view('home')->with('medias', $medias)->with('title', "History");
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
        $media = Media::findOrFail($id);
        $tags = Tag::where("media_id", "=", $id)->get();
        return view('details')->with('media', $media)->with('tags', $tags);
    }

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id); //TODO: Support errors
        $media->delete();
        $medias = Media::with("category")->get();
        return view('listemedias')->with('medias', $medias);
    }
}
