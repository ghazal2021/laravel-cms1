@extends('admin.layouts.master')
@section('content')

    <h1 class="mt-3 mb-3 text-center"> Edit Post</h1>
    <div class="box" style="width: 60%; margin:0 auto">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @method('PATCH')
            @csrf


            <div class="form-group">
                <label for="exampleInputTitle1">title</label>
                <input type="text" class="form-control" id="exampleInputTitle1" name="title" value="{{$post->title}}">
            </div>
            <div class="form-group">
                <label for="exampleInputSlug1">Slug *must be unique*</label>
                <input type="text" class="form-control" id="exampleInputSlug1" name="slug" value="{{$post->slug}}">
            </div>


            <div class="form-group">
                <label for="selectForCategory">Choose Category:</label>

                <select class="form-control" id="selectForCategory" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group">
                <label for="selectForStatus">Choose status:</label>
                <select class="form-control" id="selectForStatus" name="status">
                    <option value="0">Active</option>
                    <option value="1">Inactive</option>
                </select>


            </div>

            <div class="form-group">
                <label for="exampleFormControlFile1" class="mb-2">Choose Photo:</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo_id">
            </div>


            <div class="form-group">
                <label for="textForDescription">Description</label>
                <textarea class="form-control" id="textForDescription" rows="3" name="description"
                          >{{$post->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="textForMetaDescription">Meta Description</label>
                <textarea class="form-control" id="textForMetaDescription" rows="3" name="meta_description"
                          >{{$post->meta_description}}</textarea>
            </div>

            <div class="form-group">
                <label for="textForMetaKeywords">Meta_Keywords</label>
                <textarea class="form-control" id="textForMetaKeywords" rows="3" name="meta_keywords"
                         >{{$post->meta_keywords}}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">EDIT</button>
        </form>

    </div>


@endsection
