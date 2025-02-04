<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href=" {{asset('/css/all_admin.css')}}  ">
@yield('styles')
    <title> Hello YOU</title>
</head>
<body>

<section class="main-section">
    <div class="container-fluid">
        <div class="col-12 d-flex align-items-center" style=" background: black; height: 100px;color: #e1e0e0"> dashbord navbar </div>
        <div class="row m-0">


            <div class="col-2" style="background: #0f100f;width: 100%; height: 900px ;color:#e1e0e0;padding: 30px 20px;font-size: 18px;text-align: center;"> Hello Dear:
                <hr>

                <div class="accordion" id="accordionExample">
                    <div class="card  " style=" background: transparent; border:none">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left button-sidebr" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" >
                                    +  users
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body" style="background: #282424;border-radius: 15px; text-align: left;">
                                <li><a href="{{route('users.create')}}"> Add User</a></li>
                                <li><a href="{{route('users.index')}}"> Show Users</a></li>
                            </div>
                        </div>
                    </div>

                    <div class="card"  style=" background: transparent; border:none" >
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed button-sidebr" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    +    Categories
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body" style="background: #282424;border-radius: 15px; text-align: left;">
                                <li><a href="{{route('categories.create')}}"> Add Category</a></li>
                                <li><a href="{{route('categories.index')}}"> Show Categories</a></li>
                            </div>
                        </div>
                    </div>
                    <div class="card"  style=" background: transparent; border:none">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed button-sidebr" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    +   Posts
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body" style="background: #282424;border-radius: 15px; text-align: left;">
                                <li><a href="{{route('posts.create')}}"> Add Post</a></li>
                                <li><a href="{{route('posts.index')}}"> Show Posts</a></li>
                            </div>
                        </div>
                    </div>

                    <div class="card"  style=" background: transparent; border:none">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed button-sidebr" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    +    Comments
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body" style="background: #282424;border-radius: 15px; text-align: left;">
                                <li><a href="{{route('comments.index')}}"> Show Comments</a></li>
                                <li><a href=""> Edit Comments</a></li>
                            </div>
                        </div>
                    </div>

                    <div class="card"  style=" background: transparent;  border:none">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed button-sidebr" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    +   Media
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                            <div class="card-body" style="background: #282424;border-radius: 15px; text-align: left;">
                                <li><a href="{{route('photos.create')}}"> Add Photo</a></li>
                                <li><a href="{{route('photos.index')}}"> Show Photos</a></li>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- side bar end --->
            <div class="col-10 main-box" >
               @yield('content')
            </div>
            <!-- mainbox end --->
        </div>  <!-- row end --->

    </div>


</section>





<!-------------------------------- END --------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
-->
@yield('scripts')
</body>
</html>
