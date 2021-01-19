@extends('admin.layouts.master')
@section('content')

    @if(Session::has('del_photo'))
        <div class="alert alert-danger">{{session('del_photo')}}</div>
        @endif



    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col"></th>
            <th scope="col">User</th>
            <th scope="col">Date</th>
            <th>Delete</th>

        </tr>
        </thead>
        <tbody>
        @foreach($photos as $photo)
        <tr>
           <td>{{$photo->id}}</td>
            <td><img src="{{$photo->path}}" alt="" width="70" height="70"></td>
            <td>{{$photo->user->name}}</td>
            <td>{{$photo->created_at}}  </td>
            <td>
                <form action="{{route('photos.destroy',$photo->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                   <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $photos->links() }}

    @endsection
