@extends('layout.student.dashlayout')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold text-uppercase">View Payment Details</h2>
            </div>
        </div>

    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12 ">
            <!--Include alert file-->
            @include('include.alert')

            <div class="card-box">
                <h4 class="header-title mb-4 text-uppercase">View Details</h4>
                <table class="table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered" id="tickets-table">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Sid</th>
                            <th>Name</th>
                            <th>Floor</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Product-Id</th>
                            <th>eSewa-Status</th>
                            <th>Payment date</th>
                            <th class="hidden-sm">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(count($data))
                        @foreach($data as $index => $result)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$result->sid}}</td>
                            <td>{{$result->name}}</td>
                            <td>{{$result->floor}}</td>
                            <td>{{$result->email}}</td>
                            <td>{{$result->amount}}</td>
                            <td>{{$result->product_id}}</td>
                            <td>{{$result->esewa_status}}</td>
                            <td>{{$result->created_at}}</td>
                            <td>
                                <div class="btn-group dropdown">
                                    <a href="" class="table-action-btn dropdown-toggle arrow-none btn btn-light btn-sm" data-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('deleteStudentPayment', $result->id)}}"><i class="mdi mdi-delete mr-2 text-muted font-18 vertical-middle"></i>Delete</a> 
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
