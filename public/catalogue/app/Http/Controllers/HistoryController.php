<?php

namespace App\Http\Controllers;

use App\Models\History;

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
        $userId = auth()->user()->id;
        $medias = History::where("user_id", "=", $userId)
            ->join("medias", "medias.id", "=", "history.media_id")
            ->orderBy("history.created_at", "desc")
            ->get();
        return view('home')->with('medias', $medias)->with('title', "History");
    }
}
