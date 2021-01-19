@extends('admin.layouts.master')
@section('content')

    @if(Session::has('comment-edit'))
        <div class="alert alert-success mt-3">{{session('comment-edit')}}</div>
        @endif
    @if(Session::has('change_status'))
        <div class="alert alert-warning mt-3">{{session('change_status')}}</div>
    @endif
    @if(Session::has('del_status'))
        <div class="alert alert-danger mt-3">{{session('del_status')}}</div>
    @endif
    del_status
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col"></th>
            <th scope="col">NAME</th>
            <th>POST</th>
            <th scope="col">CM</th>
            <th scope="col">STATUS</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>

        </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td><img src="{{$comment->post->user->photo->path}}" alt="" width="50" height="50"></td>
                <td>{{$comment->post->user->name}}</td>
                <td>{{$comment->post->title}}</td>
                <td><a href="{{route('comments.show',$comment->id)}}">{{Str::limit($comment->description,20,'(...)')}}</a></td>
                <td>
                    @if($comment->status == 0)
                        <a href="{{route('comment.action',$comment->id)}}" class="btn btn-success">Active</a>
                    @else
                        <a href="{{route('comment.action',$comment->id)}}" class="btn btn-danger">Inactive</a>
                    @endif
                </td>
                <td><a href="{{route('comments.edit',$comment->id)}}" class="btn btn-warning">EDIT</a></td>
                <td>
                    <form action="{{route('comments.destroy',$comment->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>



@endsection
