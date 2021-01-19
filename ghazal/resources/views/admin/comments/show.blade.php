@extends('admin.layouts.master')
@section('content')

  <div class="cmShow">
      <div class="media mt-5">
          <img src="{{$comment->post->photo->path}}" width="100" height="100" class="mr-3" alt="...">
          <div class="media-body">
              <h3 class="mt-2">User : {{$comment->post->user->name}}</h3>
              <h3 class="mt-2">On Post : {{$comment->post->title}}</h3>
              <h3 class="mt-2">Category : {{$comment->post->category->name}}</h3>
              <hr>
     <p class="mt-2 mb-4">
         {{$comment->description}}
     </p>

              <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-warning"> Edit</a>

          </div>
      </div>
  </div>

@endsection
