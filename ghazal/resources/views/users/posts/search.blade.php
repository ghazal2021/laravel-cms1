@extends('users.layouts.master')
<!----HEADER----->
@section('header')
    <meta name="description" content=" this is description">
    <meta name="keywords" content="learn programming  html css laravel java php ">
@endsection
<!----NAVIGATION----->
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection
<!----CAROUSEL----->
@section('carousel')
    @include('partials.carousel')
@endsection
<!----CONTENT----->

@section('content')

    @foreach($posts as $post)
        <div class="post-box ">
            <h3 class="mt-3 mb-3">Latest Posts</h3>
            <h4 class="my-2">{{$post->title}}</h4>
            <h5>Written By: {{$post->user->name}}</h5>
            <hr>
            <h6>Date: {{$post->created_at}}</h6>
            <hr>
            <img src="{{$post->photo->path}}" alt="" width="500px" height="300px" style="border-radius: 15px">
            <p class="mt-4" style="line-height: 28px;padding: 10px 55px 10px 0;">{{Str::limit($post->description)}}</p>
            <a class="btn btn-primary mb-5" href="{{route('users.posts.show',$post->slug)}}"
               role="button" style="float: right; margin-right: 66px">Read More...</a>

        </div>

    @endforeach
    <div class="col-12">    {{$posts->links()}}</div>
@endsection



<!----SIDEBAR----->
@section('sidebar')
    @include('partials.sidebar',['categories'=>$categories],['posts'=>$posts])
@endsection
