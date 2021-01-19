@extends('admin.layouts.master')
@section('content')

    {{--    @if(\Illuminate\Support\Facades\Session::has('add_cat'))--}}
    {{--        <div class="alert alert-success">{{session('add_cat')}}</div>--}}
    {{--        @endif--}}

    @if(Session::has('add_cat'))
        <div class="alert alert-success">{{session('add_cat')}}</div>
    @endif
    @if(Session::has('del_cat'));
    <div class="alert alert-danger">{{session('del_cat')}}</div>
    @endif
    @if(Session::has('ed_cat'));
    <div class="alert alert-warning">{{session('ed_cat')}}</div>
    @endif


    <h1 class="mt-3 mb-3 text-center"> Add Categories:</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>

            <th scope="col">ID</th>
            <th scope="col">Category</th>
            <th>Slug</th>
            <th>Meta_keywoords</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>

                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->slug}}</td>
                <td>{{$category->meta_keywords}}</td>

                <td><a  href="{{route('categories.edit',$category->id)}}" type="submit" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
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
