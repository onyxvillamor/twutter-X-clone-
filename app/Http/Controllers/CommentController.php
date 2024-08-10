<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Twutter;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Twutter $content)
    {

        $comment = new Comment();
        $comment->twutter_id = $content->id;
        $comment->user_id = auth()->id;
        $comment->content = request()->get('comment');
        $comment->save();

        return redirect()->route('contents.show', $content->id)->with('success', "Comment posted successfully!");
    }
}
