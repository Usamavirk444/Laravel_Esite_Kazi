@extends('admin.admin_master')
@section('content')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Category</h4>
                    <a href="{{ route('all.subcategory') }}" class="btn btn-success btn-md float-right">Go Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" id="addBrand"action="{{ route('subcategory.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Select Category<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control" id="">
                                                    <option value="" disabled>Select Option</option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}"
                                                            {{ $item->id == $subcategory->category_id ? 'selected' : '' }}>
                                                            {{ $item->category_name_eng }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Category Name English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="current_password" type="hidden" name="id"
                                                    class="form-control" value="{{ $subcategory->id }}">
                                                <input type="text" name="subcategory_name_eng" class="form-control"
                                                    value="{{ $subcategory->subcategory_name_eng }}">
                                                @error('category_name_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Category Name Urdu <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="password" type="text" name="subcategory_name_urdu"
                                                    class="form-control" value="{{ $subcategory->subcategory_name_urdu }}">
                                                @error('category_name_urdu')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-block btn-info">Update
                                        Category</button>
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
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
   $(document).ready(function(){
        $('#addBrand').validate({
            errorElement: 'span',
            rules: {
                nameEng: 'required',
                nameUrdu: 'required',
                img: 'required',
            }
        })
        $(document).on('load', function() {

            $('.error').css({
                'color': 'red'
            });
        });
    }); --}}
@endsection
</script>
