@extends('admin.layouts.master')
@section('content')
 <h1 class="mt-3 text-center"> Add Yours:</h1>
    <div class="col-12 d-flex justify-content-center mt-3">

        <div class="form-box mt-5" style="width: 50%; margin-bottom:500px">
            <form action="{{url('admin/users')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" class="form-control" id="Name" name="name">
                </div>

                <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="statusSelect">Status</label>
                    <select class="form-control" id="statusSelect" name="status">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                </div>
                <h3 class="role-h3 pt-4 pb-4">Roles:</h3>
                @foreach($roles as $role)

                    <div class="form-group " style="margin-left:20px">
                        <input class="form-check-input " type="checkbox" id="{{$role->role}}" value="{{$role->id}}" name="roles[]">
                        <label class="form-check-label" for="{{$role->role}}">{{$role->role}}</label>

                    </div>
                @endforeach
                <hr>
                <div class="form-group">
                    <label for="exampleFormControlFile1" style="padding: 20px 0">Choose Your Avatar:</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="photo_id">
                </div>
                <hr>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>








@endsection
