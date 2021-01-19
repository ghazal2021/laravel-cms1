<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Photo;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
class adminPostCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('photo', 'user', 'category')->get();

        return view('admin.posts.index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories=Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();

            $photo->save();
            $post->photo_id = $photo->id;
        }
        $post->title = $request->title;
        if($post->slug = $request->slug) {
            $post->slug = Str::slug($request->slug,'-');
        }else{
            $post->slug= Str::slug($request->title,'-');
        }
        $post->category_id = $request->category_id;
        $post->status = $request->status;

        $post->user_id = Auth::id();
        $post->description= $request->description;
        $post->meta_description= $request->meta_description;
        $post->meta_keywords= $request->meta_keywords;
        $post->save();
        Session::flash('add_post','Post Added successfully');
        return redirect('admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::with('category')->where('id',$id)->first();
        $categories= Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =Post::FindOrFail($id);
        if ($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = new Photo();
            $photo->name = $file->getClientOriginalName();
            $photo->path = $name;
            $photo->user_id = Auth::id();

            $photo->save();
            $post->photo_id = $photo->id;
        }
        $post->title = $request->title;
        if($post->slug = $request->slug) {
            $post->slug = Str::slug($request->slug,'-');
        }else{
            $post->slug= Str::slug($request->title,'-');
        }
        $post->category_id = $request->category_id;
        $post->status = $request->status;

        $post->user_id = Auth::id();
        $post->description= $request->description;
        $post->meta_description= $request->meta_description;
        $post->meta_keywords= $request->meta_keywords;
        $post->save();
        Session::flash('ed_post','Post Edited successfully');
        return redirect('admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
   $post=Post::findOrFail($id);
   $post->delete();
   Session::flash('del_post','Post Deleted Successfully');
   return back();
    }


    public function actions($id)
    {
        $post=Post::findOrFail($id);
        $post->status=! $post->status;
        $post->save();
        Session::flash('status-ch','Status Changed Successfully');
        return back();
    }
}
