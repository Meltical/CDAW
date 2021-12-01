<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MediaPlaylist;
use App\Models\Playlist;
use App\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function showPlaylistsMedias()
    {
        $playlists = Playlist::join("users", "users.id", "=", "playlists.author_id")
            ->join("media_playlist", "media_playlist.playlist_id", "=", "playlists.id")
            ->join("medias", "medias.id", "=", "media_playlist.media_id")
            ->select((DB::raw("playlists.*, users.name as authorName, MIN(medias.imageUrl) as imageUrl")))
            ->groupBy("playlists.id")
            ->get();
        return view('playlists')->with('playlists', $playlists)->with('title', "Playlists");
    }

    // Display one Playlists
    public function showPlaylist($id)
    {
        $medias = MediaPlaylist::join("medias", "medias.id", "=", "media_playlist.media_id")
            ->where("media_playlist.playlist_id", "=", $id)
            ->orderBy("media_playlist.created_at", "desc")
            ->get();
        $name = Playlist::FindOrFail($id)->name;
        return view('home')->with('medias', $medias)->with('title', $name);
    }

    public function createPlaylistPage()
    {
        return view('createplaylist')->with('title', 'Create Playlist');
    }

    public function createPlaylist(Request $request)
    {
        $title = $request->input('playlist-title');
        $newPlaylist = new Playlist();
        $newPlaylist->name = $title;
        $newPlaylist->author_id = Auth::user()->id;
        $newPlaylist->save();
        return redirect("/playlists");
    }

    public function addToPlaylistPage($id)
    {
        $playlists = Playlist::join("users", "users.id", "=", "playlists.author_id")
            ->leftJoin("media_playlist", "media_playlist.playlist_id", "=", "playlists.id")
            ->leftJoin("medias", "medias.id", "=", "media_playlist.media_id")
            ->where("playlists.author_id", "=", Auth::user()->id)
            ->select((DB::raw("playlists.*, users.name as authorName, MIN(medias.imageUrl) as imageUrl, COUNT(media_playlist.id) as size")))
            ->groupBy("playlists.id")
            ->get();
        $mediaName = Media::findOrFail($id)->title;
        return view('addToPlaylist')->with('playlists', $playlists)->with('mediaName', $mediaName)->with('mediaId', $id);
    }

    public function addMediaToPlaylist(Request $request)
    {
        $mediaPlaylist = new MediaPlaylist();
        $mediaPlaylist->playlist_id = $request->input('playlistId');
        $mediaPlaylist->media_id = $request->input('mediaId');
        $mediaPlaylist->save();
        return redirect("/playlists");
    }

    // My Playlists (Created by me)
    public function showMyPlaylistsMedias()
    {
        $playlists = Playlist::join("users", "users.id", "=", "playlists.author_id")
            ->join("media_playlist", "media_playlist.playlist_id", "=", "playlists.id")
            ->join("medias", "medias.id", "=", "media_playlist.media_id")
            ->where("playlists.author_id", "=", Auth::user()->id)
            ->select((DB::raw("playlists.*, users.name as authorName, MIN(medias.imageUrl) as imageUrl")))
            ->groupBy("playlists.id")
            ->get();
        return view('playlists')->with('playlists', $playlists)->with('title', "My Playlists");
    }
}
