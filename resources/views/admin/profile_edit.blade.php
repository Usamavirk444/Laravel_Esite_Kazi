@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Profile Edit</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{route('admin.profile.update', $EditAdmin->id)}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" value="{{$EditAdmin->name}}"
                                                    data-validation-required-message="This field is required">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Email Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required="" value="{{$EditAdmin->email}}"
                                                    data-validation-required-message="This field is required">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>File Input Field <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="file" id="image" class="form-control" value="{{$EditAdmin->profile_photo_path}}">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>

                                        <img class="w-70 pb-5" id="showImage" src="{{(!empty($EditAdmin->profile_photo_path))? asset('assets/upload/admin/'.$EditAdmin->profile_photo_path)  :asset('assets/upload/no_image.jpg')}}" >

                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-block btn-info">Update</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>


    <script>
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                // console.log(reader);
                reader.onload = function(e){
                    $("#showImage").attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });

        });
    </script>

@endsection
