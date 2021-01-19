@extends('admin.layouts.master')
@section('content')
    <div class="boxEdit" style="width: 60%; margin:20px auto;">
        <form method="POST" action="/admin/comments/{{$comment->id}}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <img src="{{$comment->post->user->photo->path}}"   width="90" height="90"  alt="" style="border-radius: 15px">
            </div>
            <div class="form-group">
                <label for="name1" class="pb-1 pl-1">User is:</label>
                <input type="text" class="form-control"  name="name" id="name1" value="{{$comment->post->user->name}}" disabled>
            </div>
            <div class="form-group">
                <label for="name1" class="pb-1 pl-1">Post is :</label>
                <input type="text" class="form-control"  name="title" id="name1" value="{{$comment->post->title}}" disabled>
            </div>

            <div class="form-group pt-2">
                <label for="exampleFormControlSelect1" class="pb-1 pl-1">STATUS</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status">
                    <option value="0">ACTIVE</option>
                    <option value="1">DIACTIVE</option>
                </select>
            </div>
            <div class="form-group"><!--- DESCRIPTION   ----->
                <label for="postdescription">Description</label>
                <textarea class="form-control mt-2" id="postdescription" rows="3" name="description"> {{$comment->description}}</textarea>
            </div>


            <button type="submit" name="submit" class="btn btn-warning btn-block mb-5">EDIT</button>

        </form>
    </div>
@endsection
