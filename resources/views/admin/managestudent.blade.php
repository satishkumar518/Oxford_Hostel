@extends('layout.admin.dashlayout')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold text-uppercase">Manage Student</h2>
            </div>
        </div>

    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <!--Include alert file-->
            @include('include.alert')

            <div class="card-box">
                <a href="{{ route('addstudent') }}" class="btn btn-sm btn-blue waves-effect waves-light float-right">
                    <i class="mdi mdi-plus-circle"></i> Add Student
                </a>
                <h4 class="header-title mb-4 text-uppercase">Manage Student</h4>

                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered" id="tickets-table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Student's Info</th>
                            <th>Guardian's Info</th>
                            <th>Image</th>
                            <th>joining Date</th>
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($data))
                        @foreach($data as $index => $result)
                        <tr>
                            <td><b>{{ $index+1 }}</b></td>
                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Name:</b> <span>{{$result->name}}</span></li>
                                    <li><b>Phone:</b> <span>{{$result->contact_no}}</span></li>
                                    <li><b>Address:</b> <span>{{$result->address}}</span></li>
                                    <li><b>Date of Birth:</b> <span>{{$result->dob}}</span></li>
                                    <li><b>Email:</b> <span>{{$result->email}}</span></li>
                                </ul>
                            </td>

                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Name:</b> <span>{{$result->gname}}</span></li>
                                    <li><b>Phone:</b> <span>{{$result->gcontact_no}}</span></li>
                                </ul>
                            </td>

                            <td><img src="../{{$result->image}}" alt="" class=" w-100 h-100"></td>
                            <td>{{$result->created_at}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#add"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a>
                                        <a class="dropdown-item" href="{{route('editstudent', $result->id)}}"><i class="fa fa-wrench mr-2 text-muted font-18 vertical-middle"></i>Edit</a>
                                        <a class="dropdown-item" href="#print"><i class="mdi mdi-printer mr-2 text-muted font-18 vertical-middle"></i>
                                            Print</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="6">No record found!</td>
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