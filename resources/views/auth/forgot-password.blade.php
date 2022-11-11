@extends('frontend.main_master')
@section('content')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Forgot Password</li>
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
                        <p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                        @if(session()->has('error'))
                        <div class="alert alert-success">
                            {{ session()->get('error') }}
                        </div>
                    @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <label class="info-title" for="email">Email <span>*</span></label>
                                <input type="email" class="form-control unicase-form-control text-input" name="email"
                                    id="email">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
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
