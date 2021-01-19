
<div class="card mt-4" >
    <h4 class="card-header" style="font-weight: bold;  color:#545464">What Are You Looking For?</h4>
    <div class="card-body">
        <form class="form-inline my-2 my-lg-0" role="search" action="{{route('users.posts.search')}}" method="GET">
            @csrf
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search">
            <button class="btn btn-outline-info my-2 my-sm-0 " type="submit">Search</button>
        </form>

    </div>
</div><!--- search card finished --->
<div class="card mt-2">
    <div class="card-header">
        <h4 style="font-weight: bold; color:#545464"> Categories</h4>
    </div>
    <ul class="list-group list-group-flush">
        @foreach($categories as $category)
            <li class="list-group-item" style="border:none">{{$category->name}}</li>

        @endforeach
    </ul>
</div>

<div class="card mt-2">
    <div class="card-header">
        <h4 style="font-weight: bold; color:#545464"> Posts</h4>
    </div>
    <ul class="list-group list-group-flush">
        @foreach($posts as $post)
            <li class="list-group-item" style="border:none">{{$post->title}}</li>
        @endforeach
    </ul>
</div>
