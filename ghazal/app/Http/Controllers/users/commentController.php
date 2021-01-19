<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class commentController extends Controller
{
    public function store(Request $request,$postId)
    {
        $post=Post::findOrFail($postId);
        if($post) {
            $comment = new Comment();
            $comment->user_id = Auth::id();
            $comment->post_id=$post->id;
            $comment->status = 1;
            $comment->description = $request->description;
            $comment->save();
            Session::flash('add_cm','Your Comment  already has been Sent Successfully , We will reply you soon');
            return back();
        }
    }
}
