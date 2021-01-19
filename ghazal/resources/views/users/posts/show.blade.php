@extends('users.layouts.master')
<!----HEADER----->
@section('header')
    <meta name="description" content="{{$post->meta_description}}">
    <meta name="keywords" content="{{$post->meta_keywords}}">
@endsection
<!----NAVIGATION----->
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection



@section('content')
    @if(Session::has('add_cm'))
        <div class="alert alert-success mt-5">{{session('add_cm')}}</div>
    @endif

    @if(Session::has('add_reply'))
        <div class="alert alert-success mt-5">{{session('add_reply')}}</div>
    @endif

    <div class="post-box ">
        <h3 class="my-2">{{$post->title}}</h3>
        <h5>Written By: {{$post->user->name}}</h5>
        <hr>
        <h6>Date: {{$post->created_at}}</h6>
        <hr>
        <img src="{{$post->photo->path}}" alt="" width="500px" height="300px" style="border-radius: 15px">
        <p class="mt-4" style="line-height: 28px;padding: 10px 55px 10px 0;">{{$post->description}}</p>

    </div><!---end post box ---->
    <hr>
    <!---Form Cm ---->
    <div class="cm-box">
        <h5 class="text-center mt-5 mb-5">What Do You Think?</h5>
        <form method="POST" action="{{route('comments',$post->id)}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputName">Your Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputName">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Write Here:</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </form>
    </div>
    <hr class="mb-5">

    <!---Others Cm ---->
    <div class="reply-box mt-5">
        <h3 class="text-center">See What Others Think ... </h3>
        @foreach($post->comments as $comment)
            <div class="media mb-4">

                <img src="{{$comment->post->user->photo->path}}" style="border-radius: 50%" class="mr-3" alt="..."
                     width="50" height="50">
                <div class="media-body">
                    <div class="cm-body"
                         style="background: lavenderblush;padding: 10px 0 10px 25px; border-radius: 20px">
                        <div class="row">
                            <div class="col-10"><h5>{{$comment->post->user->name}}</h5></div>
                            <div class="col-2"><!---- Button reply form --->
                                <button class="btn btn-primary btn-reply" type="button" id="reply-btn"
                                        onclick="showReplyForm('{{$comment->id}}','{{$comment->user->name}}')">
                                    Reply
                                </button>



                            </div>
                        </div>


                        <p class="mt-0" style="color:#666565">{{$comment->created_at->format('D,d m y H:i')}}</p>
                        <div class="cm-boox " style="width: 100%">
                            {{$comment->description}}
                        </div>
                    </div> <!----- end cm body--->
                    <div id="toggle-example"><!----reply form for cm  --->
                        <div class="card card-body">
                            <form method="POST" action="{{route('reply',$comment->id)}}">
                                @csrf
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <input type="hidden" name="post_id" value="{{$comment->post->id}}">

                                <div class="form-group">
                                    <textarea class="form-control" name="msg" id="reply-form-{{$comment->id}}-text" rows="3"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div><!------- end reply form for cm ------>
                    @if($comment->replies->count()  > 0)
                    @foreach($comment->replies as $reply)
                        <div class="media mt-3 d-block">
                            <a class="mr-3" href="#">
                                <img src="{{$reply->user->photo->path}}" width="50 " height="50" class="mr-3" alt="..."
                                     style="border-radius: 50%">
                            </a>
                            <div class="media-body">
                                <div class="cm-body"
                                     style="background: #e1fbff;padding: 10px 0 10px 25px; border-radius: 20px">
                                    <div class="row">
                                        <div class="col-10 pr-0"><h5>{{$reply->user->name}}</h5></div>
                                        <div class="col-2 p-0">
                                            <button class="btn btn-primary btn-reply" type="button" id="reply-btn"
                                                    onclick="showReplyForm('{{$comment->id}}','{{$reply->user->name}}')">
                                                Reply
                                            </button>
                                        </div>
                                    </div>

                                    <p class="mt-0"
                                       style="color:#666565">{{$reply->created_at->format('D,d m y H:i')}}</p>
                                    <div class="cm-boox " style="width: 100%">
                                        {{$reply->msg}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" id="reply-form-{{$comment->id}}"><!----reply form for cm  --->
                                <div class="card card-body">
                                    <form method="POST" action="{{route('reply',$comment->id)}}">
                                        @csrf
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        <input type="hidden" name="post_id" value="{{$comment->post->id}}">

                                        <div class="form-group">
                                            <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div><!------- end reply form for cm ------>
                        </div>
                    @endforeach
                    @else
                    @endif
                </div>
            </div>
        @endforeach
    </div>


@endsection


<!----SIDEBAR----->
@section('sidebar')
    @include('partials.sidebar',['categories'=>$categories],['posts'=>$posts])
@endsection
@section('script')
    <script type="text/javascript">
        function showReplyForm(commentId, user) {
            var x = document.getElementById('reply-form-${commentId}');
            var input = document.getElementById('reply-form-${commentId}-text');
            if (x.style.display === "none") {
                x.style.display = "block";
                input.innerText = '@${user}';

            } else {
                x.style.display = "none";
            }
        }

    </script>

@endsection
