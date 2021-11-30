<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Like;
use App\Models\Tag;
use App\Models\category;
use App\Models\History;
use App\Models\MediaPlaylist;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function showPlaylistsMedias()
    {
        $playlists = Playlist::join("users", "users.id", "=", "playlists.author_id")
            ->join("media_playlist", "media_playlist.playlist_id", "=", "playlists.id")
            ->join("medias", "medias.id", "=", "media_playlist.media_id")
            ->select("playlists.*", "users.name as authorName", "medias.imageUrl")
            ->orderBy("media_playlist.created_at", "desc")
            ->limit(1)
            ->get();
        return view('playlists')->with('playlists', $playlists)->with('title', "Playlists");
    }

    public function showPlaylist($id)
    {
        $medias = MediaPlaylist::join("medias", "medias.id", "=", "media_playlist.media_id")
            ->orderBy("media_playlist.created_at", "desc")
            ->get();
        $name = Playlist::FindOrFail($id)->name;
        return view('home')->with('medias', $medias)->with('title', $name);
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
        $tags = Tag::where("media_id", "=", $id)->get();
        if ($loggedUser) {
            $userId = $loggedUser->id;
            $likedMedia = Like::select('*')
                ->where('media_id', '=', $id)
                ->where('user_id', '=', $userId)
                ->get();
            if (count($likedMedia)) {
                return view('details')->with('media', $media)->with('isLiked', true)->with('tags', $tags)->with('isLoggedIn', true);
            } else {
                return view('details')->with('media', $media)->with('isLiked', false)->with('tags', $tags)->with('isLoggedIn', true);
            }
        }
        return view('details')->with('media', $media)->with('isLiked', false)->with('tags', $tags)->with('isLoggedIn', false);
    }

    public function deleteMedia($id)
    {
        $media = Media::findOrFail($id); //TODO: Support errors
        $media->delete();
        $medias = Media::with("category")->get();
        return view('listemedias')->with('medias', $medias);
    }
}
