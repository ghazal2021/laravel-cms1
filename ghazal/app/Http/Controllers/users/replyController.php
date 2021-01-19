<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class replyController extends Controller
{
    public function store(Request $request,$commentId)
    {

        $comment=Comment::findOrFail($commentId);
        if($comment) {
            $reply = new Reply();
            $reply->user_id = Auth::id();
            $reply->comment_id=$comment->id;
            $reply->status = 1;
            $reply->msg = $request->msg;
            $reply->save();
            Session::flash('add_reply','Your Reply  already has been Sent Successfully , We will reply you soon');
            return back();
        }
    }
}
