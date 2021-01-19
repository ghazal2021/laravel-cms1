@extends('admin.layouts.master')
@section('content')

    <h1 class="text-center mt-3 mb-3">Add Category:</h1>
    <div class="box " style="width:40% ;margin:0 auto">
        <form action="{{url('admin/categories')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category" class="mb-3">Category</label>
                <input type="text" class="form-control" id="category" name="name" >
            </div>
            <div class="form-group">
                <label for="forSlug" class="mb-3">Slug</label>
                <input type="text" class="form-control" id="forSlug" name="slug" >
            </div>
            <div class="form-group">
                <label for="metaDes">Meta_description</label>
                <textarea class="form-control" id="metaDes"  name="meta_description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="metKey">Meta_keywords</label>
                <textarea class="form-control" id="metKey"name="meta_keywords" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
    </div>


@endsection
