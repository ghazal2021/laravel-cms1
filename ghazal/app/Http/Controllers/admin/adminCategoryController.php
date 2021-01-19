<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class adminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return  view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return  view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

       $category= new Category();
       $category->name= $request->name;
       if($category->slug= $request->slug) {
           $category->slug = Str::slug($request->slug,'-');
       }else{
          $category->slug= Str::slug($request->name,'-');
       }
       $category->meta_description=$request->meta_description;
       $category->meta_keywords=$request->meta_keywords;
       $category->save();
      Session::flash('add_cat','Category Added Successfully');
       return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category= Category::findOrFail($id);
        $category->name= $request->name;
        if($category->slug= $request->slug) {
            $category->slug = Str::slug($request->slug ,'-');
        }else{
            $category->slug= Str::slug($request->name ,'-');
        }
        $category->meta_description=$request->meta_description;
        $category->meta_keywords=$request->meta_keywords;
        $category->save();
        Session::flash('ed_cat','Category Edited Successfully');
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category=Category::findOrFail($id);
       $category->delete();
       Session::flash('del_cat','Category Deleted Successfully');
       return back();
    }
}
