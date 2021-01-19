@extends('admin.layouts.master')
@section('content')

    <h1 class="text-center mt-3 mb-3">Add Category:</h1>
    <div class="box " style="width:40% ;margin:0 auto">
        <form action="/admin/categories/{{$category->id}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="category" class="mb-3">Category</label>
                <input type="text" class="form-control" id="category" name="name" value="{{$category->name}}" >
            </div>
            <div class="form-group">
                <label for="forSlug" class="mb-3">Slug</label>
                <input type="text" class="form-control" id="forSlug" name="slug"value="{{$category->slug}}" >
            </div>
            <div class="form-group">
                <label for="metaDes">Meta_description</label>
                <textarea class="form-control" id="metaDes"  name="meta_description" rows="3">{{$category->meta_description}}</textarea>
            </div>
            <div class="form-group">
                <label for="metKey">Meta_keywords</label>
                <textarea class="form-control" id="metKey"name="meta_keywords" rows="3">{{$category->meta_keywords}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>


@endsection
