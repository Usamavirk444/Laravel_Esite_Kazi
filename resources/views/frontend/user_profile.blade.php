@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="body-content">
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    <br><br>
                    <img class="card-img-top p-5" id="userImage" style="border-radius:50%"
                        src="{{ !empty($user->profile_photo_path) ? asset('assets/upload/user/' . $user->profile_photo_path) : asset('assets/upload/no_image.jpg') }}"
                        alt="User-Profile" height="100%" width="100%"> <br><br>
                        <ul class="list-group list-group-flush">
                            <a href="" class="btn btn-primary btn-sm btn-block">Home</a>
                            <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile update</a>
                            <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                            <a href="{{route('user.logout')}}" class="btn btn-warning btn-sm btn-block">logout</a>
                        </ul>
                </div>
                <div class="col-md-2">

                </div>
                <div class="col-md-6">

                    <div class="card">
                        <h3 class="text-center"> <span class="text-danger">Hii....</span> <strong>{{Auth::user()->name}}</strong>  Welcome TO Usama's Shop</h3>
                        <div class="card-body">
                            <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Nmail">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{$user->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" id="image" name="image" class="form-control" value="{{$user->email}}">
                                </div>

                                <div class="form-group">

                                    <button type="submit" class="btn btn-danger">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    $('document').ready(function(){
        $('#image').change(function(e){
             var reader = new FileReader();
             reader.onload=function(e){
                $("#userImage").attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>


@endsection
