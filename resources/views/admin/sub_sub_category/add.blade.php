@extends('admin.admin_master')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="container-full">

        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add SUb Category</h4>
                    <a href="{{ route('all.category') }}" class="btn btn-success btn-md float-right">Go Back</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" id="addBrand" action="{{ route('subsubcategory.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Category Name English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control">
                                                    <option value="" selected disabled>Select Category</option>
                                                    @foreach ($category as $item)
                                                        <option value="{{ $item->id }}">{{ $item->category_name_eng }}
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
                                            <h5>Sub Category Name English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="subcategory_id" class="form-control" id="">
                                                    <option value="" selected disabled>Select Sub Category</option>

                                                </select>

                                                @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Sub Sub Category Name English <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subsubcategory_name_eng" class="form-control">
                                                @error('subcategory_name_eng')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Sub Sub Category Name Urdu <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="" type="text" name="subsubcategory_name_urdu"
                                                    class="form-control">
                                                @error('subsubcategory_name_urdu')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-block btn-info">Add Sub
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

<script type="text/javascript">
   $(document).ready(function(){
        $('select[name="category_id"]').on('change',function (){
            var category_id = $(this).val();
            if(category_id){
                $.ajax({
                    url:"{{url('/subsubcategory/subcategory/ajax')}}/" +  category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                       var d =$('select[name="subcategory_id"]').empty();
                          $.each(data, function(key, value){
                              $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_eng + '</option>');
                          });
                    },
                })
            }
            else{
                alert('opppssss!');
            }
        });
    });
</script>
@endsection
