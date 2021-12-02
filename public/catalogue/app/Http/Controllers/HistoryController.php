<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $userId = Auth::user()->id;
        $medias = History::where("user_id", "=", $userId)
            ->join("medias", "medias.id", "=", "history.media_id")
            ->orderBy("history.created_at", "desc")
            ->get();
        return view('home')->with('medias', $medias)->with('title', "History");
    }

    public function store($mediaId)
    {
        $userId = Auth::user()->id;
        $history = History::where('media_id', '=', $mediaId)
            ->where('user_id', '=', $userId)
            ->first();
        if ($history) {
            $history->delete();
        } else {
            History::create([
                'media_id' => $mediaId,
                'user_id' => Auth::user()->id,
            ]);
        }
        return redirect()->route('media.show', $mediaId);
    }
}
