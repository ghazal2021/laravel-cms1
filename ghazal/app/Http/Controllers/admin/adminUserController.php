<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class adminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::with('roles','photo')->get();
$postCount=Post::count();
        return view('admin.users.index',compact('users','postCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
$user= new User();
if($file= $request->file('photo_id')){
    $name=time().$file->getClientOriginalName();
    $file->move('images',$name);
    $photo= new Photo();
    $photo->name= $file->getClientOriginalName();
    $photo->path=$name;
    $photo->user_id=Auth::id();
    $photo->save();
    $user->photo_id=$photo->id;
}
$user->name=$request->name;
$user->email=$request->email;
$user->password=bcrypt($request->password);
$user->status= $request->status;
$user->save();
$user->roles()->attach($request->roles);
Session::flash('add_user','User Added successfully');
return redirect('admin/users');
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
        $user = User::findOrFail($id);
        $roles= Role::all();
        return view('admin.users.edit', compact('user','roles'));
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

        $user= User::findOrFail($id);

        if($file= $request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo= new Photo();
            $photo->name= $file->getClientOriginalName();
            $photo->path=$name;
            $photo->user_id=Auth::id();
            $photo->save();
            $user->photo_id=$photo->id;
        }
        if(trim($request->name!="")){
            $user->name=$request->name;
        }
        if(trim($request->email!="")){
            $user->email=$request->email;
        }
        if(trim($request->password!="")){
            $user->password=bcrypt($request->password);
        }
        if(trim($request->status!="")){
            $user->status=$request->status;
        }

        $user->save();
        $user->roles()->sync($request->roles);
        Session::flash('edit_user','User Edited successfully');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
//        $photo=Photo::findOrFail($id);
//        unlink(public_path().$user->photo->path);
//        $photo->delete();
        $user->delete();
        Session::flash('del_user', ' This User Deleted Successfully');
        return back();
    }

    public function action($id)
    {
        $user= User::findOrFail($id);
        $user->status= ! $user->status;
        if($user->save()){
            Session::flash('changed','User Status Changed');
            return back();

        }
    }
}
