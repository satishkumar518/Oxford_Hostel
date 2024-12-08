@extends('layout.admin.dashlayout')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold text-uppercase">Manage Rooms</h2>
            </div>
        </div>

    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <!--Include alert file-->
            {{-- @include('include.alert') --}}
            @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            <div class="card-box">
                <a href="{{ route('addroom') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> Add Room
                </a>
                <h4 class="header-title mb-4 text-uppercase">Manage Rooms</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered" id="tickets-table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Floor</th>
                            <th>Total Room Number</th>
                            <th>Total Bed Number</th>
                            <th>Price</th>
                            <th>Created-Data</th>
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($data))
                        @foreach($data as $index => $result)
                        <tr>
                            <td><b>{{ $index+1 }}</b></td>
                            <td>{{$result->floor}}</td>
                            <td>{{$result->total_room}}</td>
                            <td>{{$result->total_bed}}</td>
                            <td>{{$result->price}}</td>
                            <td>{{$result->created_at}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('room.delete', $result->id)}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                        <a class="dropdown-item" href="{{route('editroom', $result->id)}}"><i class="fa fa-wrench mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="9">No record found!</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div><!-- end col -->
        </div>
    </div>
    <!-- end row -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
</div>
    
@endsection