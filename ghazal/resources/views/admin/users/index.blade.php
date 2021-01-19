@extends('admin.layouts.master')
@section('content')

    @if(\Illuminate\Support\Facades\Session::has('changed'))
        <div class="alert alert-warning mt-3">{{session('changed')}}</div>
        @endif

    @if(\Illuminate\Support\Facades\Session::has('del_user'))
        <div class="alert alert-danger mt-3">{{session('del_user')}}</div>
        @endif

    @if(\Illuminate\Support\Facades\Session:: has('add_user'))
        <div class="alert alert-success mt-3">{{session('add_user')}}</div>
        @endif
{{--    @if(\Illuminate\Support\Facades\Session::has('edit_user'))--}}
{{--        <div class="alert alert-success mt-3">{{$session('edit_user')}}</div>--}}
{{--        @endif--}}

    <table class="table mt-5">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">Email</th>
            <th>Posts</th>
            <th> Roles</th>
            <th> Status</th>
            <th scope="col">EDIT</th>
            <th scope="col">DELETE</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr style="background: #00000045">
            <td><img src="{{$user->photo ? $user->photo->path:"http://www.placehold.it/400"}}" width="50" height="50" alt="" style="border-radius: 20px"></td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
<td>{{$postCount}}</td>
            <td>
                @foreach($user->roles as $role)
                    <ul>
                        <li>{{$role->role}}</li>
                    </ul>
                    @endforeach
            </td>

<td>
    @if($user->status ==0 )
        <a href="{{route('users.action',$user->id)}}" type="submit" class="btn btn-success" > Active</a>
    @else
    <a  href="{{route('users.action',$user->id)}}" type="submit" class="btn btn-danger">Inactive</a>
        @endif
</td>

            <td><a href="{{route('users.edit',$user->id)}}" type="button" class="btn btn-warning">EDIT</a></td>

            <td>
                <form method="POST" action="{{route('users.destroy', $user->id)}}">
                    @csrf
                    @method('DELETE')
                    <button  type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </td>
        </tr>
@endforeach
        </tbody>
    </table>


@endsection



