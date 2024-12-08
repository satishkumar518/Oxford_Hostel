@extends('layout.student.dashlayout')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <h2 class="page-title font-weight-bold text-uppercase">view Booking details</h2>
            </div>
        </div>

    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <!--Include alert file-->
            {{-- @include('include.alert') --}}

            <div class="card-box">
                <h4 class="header-title mb-4 text-uppercase">view details</h4>
                <table class="table table-hover m-0 table-centered dt-responsive nowrap w-100 table-bordered" id="tickets-table">
                    <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Sid</th>
                            <th>Name</th>
                            <th>Floor</th>
                            <th>Duration</th>
                            <th>Amount</th>
                            <th>Room No</th>
                            <th>Bed No</th>
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
                            <td>{{$result->duration}}</td>
                            <td>{{$result->price}}</td>
                            <td>{{$result->room_no}}</td>
                            <td>{{$result->bed_no}}</td>
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