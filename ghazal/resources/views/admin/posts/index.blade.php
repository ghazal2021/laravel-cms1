@extends('admin.layouts.master')

@section('content')

    @if(\Illuminate\Support\Facades\Session::has('add_post'))
        <div class="alert alert-success">{{session('add_post')}}</div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('del_post'));
    <div class="alert alert-danger">{{session('del_post')}}</div>
    @endif
    @if(\Illuminate\Support\Facades\Session::has('ed_post'));
    <div class="alert alert-warning">{{session('ed_post')}}</div>
    @endif
@if(Session::has('status-ch'));
<div class="alert alert-warning">{{session('status-ch')}}</div>
@endif

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">img</th>
            <th scope="col">Title</th>
            <th scope="col">category</th>
            <th>Status</th>
            <th scope="col">Description</th>
            <th scope="col">Author</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>

                <td><img src="{{$post->photo->path}}" alt="" width="70" height="70"></td>
                <td>{{$post->title}}</td>

                <td>{{$post->category->name}}</td>
                <td>
                    @if($post->status == 0)
                        <a href="{{route('posts.status',$post->id)}}"class="btn btn-success">Active</a>
@else
                        <a href="{{route('posts.status',$post->id)}}"class="btn btn-danger">Inactive</a>
                    @endif


                </td>
                <td>{{Str::limit($post->description, 20, ' (...)')}}</td>
                <td>{{$post->user->name}}</td>
                <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>




@endsection
