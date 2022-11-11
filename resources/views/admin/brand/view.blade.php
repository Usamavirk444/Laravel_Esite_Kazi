@extends('admin.admin_master')
@section('content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Brand List</h3>
                            <a href="{{route('brands.add')}}" class="btn btn-success btn-md float-right">Add Brand</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Brand Eng</th>
                                            <th>Brnad Urdu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brand as $item )
                                        <tr>
                                            <td><img src="{{asset($item->brand_img)}}" width="100px" height="100px" alt="No img"></td>
                                            <td>{{$item->brand_name}}</td>
                                            <td>{{$item->brand_name_urdu}}</td>
                                            <td>
                                                <a href="{{route('brands.edit', $item->id)}}" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                <a href="{{route('brands.delete',$item->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>
@endsection

@section('page_level_script')
    <!-- Data table -->
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('/backend/js/pages/data-table.js') }}"></script>

@endsection
