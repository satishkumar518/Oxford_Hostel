@extends('layout.student.dashlayout')
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold">DASHBORAD</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row justify-content-center">
                    <div class="col-3">
                        <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                            <i class="fe-user font-22 avatar-title text-primary"></i>
                        </div>
                        <div class="text-center ">
                            <p class="mt-2">
                                <a href="{{route('studentProfile')}}">View Profile</a>                              
                            </p>
                            <h6>
                            
                            </h6>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- end row-->
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->

        

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-box">
                <div class="row justify-content-center">
                    <div class="col-3">
                        <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                            <i class="fe-eye font-22 avatar-title text-warning"></i>
                        </div>
                        <div class="text-center">
                            {{-- <p class="text-muted mt-2 text-truncate">View Booking Details</p> --}}
                            <a href="{{route('viewBookDetails')}}" class=" mt-2">View Booking Details</a>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
            <!-- end widget-rounded-circle-->
        </div>
        <!-- end col-->
    </div>
</div>
    
@endsection