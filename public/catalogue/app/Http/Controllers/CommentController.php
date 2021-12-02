<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->media_id = $request->input("media_id");
        $comment->text = $request->input("text");
        $comment->save();
        return redirect("media/" . $comment->media_id);
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->route('media.show', $comment->media_id);
    }
}
