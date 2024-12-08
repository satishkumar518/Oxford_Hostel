@extends('layout.admin.dashlayout')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row mt-2">
        <div class="col-12 text-center">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold">Change Password</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    {{-- @include('include.alert') --}}
                    {{-- error --}} 
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>  
                    @endif  

                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>  
                    @endif  

                    <form action="{{route('update_password')}}" method="post">
                       @csrf
                        <div class="row">
                            {{-- Old Password --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Old-Password</label>
                                    <input type="password" name="old_password" class="form-control">
                                    <span class="text-danger">
                                        @error('old_password')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            
                            {{-- New Password --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>New-Password</label>
                                    <input type="password" name="new_password" class="form-control">
                                    <span class="text-danger">
                                        @error('new_password')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            {{-- Confirm Password --}}
                            <div class="col-md-12">
                                <div class="form-group mb-1">
                                    <label>Confirm-Password</label>
                                    <input type="password" name="confirm_password" class="form-control">
                                    <span class="text-danger">
                                        @error('confirm_password')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                        </div>   
                        <hr>

                        <div class="row m-auto justify-content-center">
                           <button type="submit" class="btn btn-primary ">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
    
@endsection