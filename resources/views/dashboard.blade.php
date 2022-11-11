@extends('frontend.main_master')
@section('content')
    <div class="body-content">
        <div class="container">
            <div class="row">

                <div class="col-md-2">
                    <br><br>
                    <img class="card-img-top p-5" style="border-radius:50%"
                        src="{{ !empty($EditAdmin->profile_photo_path) ? asset('assets/upload/admin/' . $EditAdmin->profile_photo_path) : asset('assets/upload/no_image.jpg') }}"
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
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
