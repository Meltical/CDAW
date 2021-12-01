<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Like;
use App\Models\Tag;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MediasController extends Controller
{
    public function showListeMedias()
    {
        $medias = Media::all();
        return view('home')->with('medias', $medias)->with('title', "Curated For You");
    }

    public function showCreateMedia()
    {
        return view('createMedia');
    }

    public function createMedia(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $imageUrl = $request->input('imageUrl');
        $trailerUrl = $request->input('trailerUrl');
        $studio = $request->input('studio');

        $tag1 = $request->input('tag1');
        $tag2 = $request->input('tag2');
        $tag3 = $request->input('tag3');

        $dataMedia = [
            'title' => $title,
            'description' => $description,
            'imageUrl' => $imageUrl,
            'trailerUrl' => $trailerUrl,
            'studio' => $studio,
            'type' => 'ANIME'
        ];

        $id = Media::insertGetId($dataMedia);

        $dataTags = [];
        if ($tag1 != null) {
            array_push($dataTags, [
                'name' => $tag1,
                'media_id' => $id
            ],);
        }
        if ($tag2 != null) {
            array_push($dataTags, [
                'name' => $tag2,
                'media_id' => $id
            ],);
        }
        if ($tag3 != null) {
            array_push($dataTags, [
                'name' => $tag3,
                'media_id' => $id
            ],);
        }

        Tag::insert($dataTags);

        return redirect("/medias/{$id}");
    }

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id);
        $media->delete();
        return redirect('/');
    }

    public function showLikedMedias()
    {
        $userId = auth()->user()->id;
        $medias = Like::where("user_id", "=", $userId)
            ->join("medias", "medias.id", "=", "like.media_id")
            ->orderBy("like.created_at", "desc")
            ->get();
        return view('home')->with('medias', $medias)->with('title', "Likes");
    }

    public function showUpdateMedia($id)
    {
        $media = Media::findOrFail($id);
        $tags = Tag::where("media_id", "=", $id)->get();
        return view('updateMedia')->with('media', $media)->with('tags', $tags);
    }

    public static function updateMedia(Request $request, $id)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $imageUrl = $request->input('imageUrl');
        $trailerUrl = $request->input('trailerUrl');
        $studio = $request->input('studio');

        $media = [
            'title' => $title,
            'description' => $description,
            'imageUrl' => $imageUrl,
            'trailerUrl' => $trailerUrl,
            'studio' => $studio,
            'type' => 'ANIME'
        ];

        $tags = Tag::where("media_id", "=", $id)->get();
        foreach ($tags as $tag) {
            $tag->name = $request->input('tag' . $tag->id);
            $tag->save();
        }

        Media::whereId($id)->update($media);

        return redirect("/medias/{$id}");
    }

    public function showMedia($id)
    {
        $loggedUser = Auth::user();
        $media = Media::findOrFail($id);
        $tags = Tag::where("media_id", "=", $id)->get();
        $comments = Comment::where("media_id", "=", $id)->get();
        if ($loggedUser) {
            $userId = $loggedUser->id;
            $likedMedia = Like::select('*')
                ->where('media_id', '=', $id)
                ->where('user_id', '=', $userId)
                ->get();
            if (count($likedMedia)) {
                return view('medias')->with('comments', $comments)->with('media', $media)->with('isLiked', true)->with('tags', $tags)->with('isLoggedIn', true);
            } else {
                return view('medias')->with('comments', $comments)->with('media', $media)->with('isLiked', false)->with('tags', $tags)->with('isLoggedIn', true);
            }
        }
        return view('medias')->with('comments', $comments)->with('media', $media)->with('isLiked', false)->with('tags', $tags)->with('isLoggedIn', false);
    }
}
