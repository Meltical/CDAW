<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Media;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LikeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function likeService($mediaId)
    {
        $loggedUser = Auth::user();
        $tags = Tag::where("media_id", "=", $mediaId)->get();
        if ($loggedUser) {
            $userId = $loggedUser->id;
            $media = Media::findOrFail($mediaId);
            $likedMedia = Like::select()
                ->where('media_id', '=', $mediaId)
                ->where('user_id', '=', $userId)
                ->get();
            if (count($likedMedia)) {
                $likedId = $likedMedia[0]->id;
                Like::find($likedId)->delete();
                return redirect('media/' . $mediaId)->with('media', $media)->with('isLiked', true)->with('tags', $tags)->with('isLoggedIn', true);
            } else {
                $like = new Like;
                $like->media_id = $mediaId;
                $like->user_id = $userId;
                $like->save();
                return redirect('media/' . $mediaId)->with('media', $media)->with('isLiked', false)->with('tags', $tags)->with('isLoggedIn', true);
            }
        }
    }
}
