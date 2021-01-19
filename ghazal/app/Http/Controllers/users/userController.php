<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
    {
        $posts=Post::with('user','photo','category')->where('status',0)->orderBy('created_at','desc')->paginate(2);
        $categories=Category::all();
        return view('users.main.index',compact('categories','posts'));
    }
}
