@extends('frontend.main_master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Reset Password</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->

    <div class="body-content">
        <div class="container">
            <div class="sign-in-page" style="margin: 0px auto; width:50%">
                <div class="row">
                    <!-- Sign-in -->
                    <div class="col-md-12 col-sm-12 sign-in">
                        <h4 class="">Sign in</h4>
                        <p class="">Forgot your password? No problem. Just let us know your email address and we will
                            email you a password reset link that will allow you to choose a new one.</p>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label class="info-title" for="email">Email <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email"
                                    id="email" value="{{old('email', $request->email)}}">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password">Password <span>*</span></label>
                                <input id="password" class="form-control unicase-form-control text-input" type="password"
                                    name="password">
                            </div>

                            <div class="form-group">
                                <label class="info-title" for="password_confirmation">Confirm Password
                                    <span>*</span></label>
                                <input id="password_confirmation"
                                    class="form-control unicase-form-control text-input"type="password"
                                    name="password_confirmation">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset
                                Password</button>
                        </form>

                    </div>
                    <!-- Sign-in -->

                </div><!-- /.row -->
            </div><!-- /.sigin-in-->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->
            @include('frontend.partials.brand')
            <!-- /.logo-slider -->
            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
        </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
