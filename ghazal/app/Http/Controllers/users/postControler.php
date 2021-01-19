<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class postControler extends Controller
{
public function show($slug){
$post=Post::with(['photo','category','user','comments'=>function($q){
        $q->where('status',0);
    }])->where('slug',$slug)->where('status',0)->first();
$categories = Category::all();
$posts=Post::all();
return view('users.posts.show',compact('post','categories','posts'));
}

    public function search(Request $request)
    {
   $query=$request->get('search');
   $posts=Post::with('user','category','photo')->where('title','like',"%".$query."%")
       ->orWhere('description','like',"%{$query}%")->where('status',0)
       ->orderBy('created_at','desc')->paginate(2);
   $categories=Category::all();

   return view('users.posts.search',compact('posts','categories','query'));
}
}
