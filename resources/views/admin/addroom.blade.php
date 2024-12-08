@extends('layout.admin.dashlayout')
@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold">Add Room</h4>
                
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    {{-- @include('include.alert') --}}
                    {{-- error --}} 
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{Session::get('error')}}</div>  
                    @endif

                    <h4 class="header-title text-uppercase">Add New Room</h4>
                    <h6 class="text-danger">All field is required</h6>
                    <hr>
                   
                    <form action="{{route('add_room_submit')}}" method="post">
                       @csrf
                        <div class="row">
                            {{-- Floor --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Floor</label>
                                    <select class="form-control border-bottom" name="floor" id="floor-select" onchange="updateRoomOptions()">
                                        <option value="">Please select floor</option>
                                        <option value="Ground Floor" {{old('floor')=='Ground Floor' ? 'selected' : ''}}>Ground Floor</option>
                                        <option value="1st Floor" {{old('floor')=='1st Floor' ? 'selected' : ''}}>1st Floor</option>
                                        <option value="2nd Floor" {{old('floor')=='2nd Floor' ? 'selected' : ''}}>2nd Floor</option>
                                        <option value="3rd Floor" {{old('floor')=='3rd Floor' ? 'selected' : ''}}>3rd Floor</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('floor')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                    
                                </div>
                            </div>

                            {{--Total Room No --}}
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Total Room</label>
                                    <input type="text" name="room_no" class="form-control border-bottom" value="{{old('room_no')}}" placeholder="Enter total room number">
                                    <span class="text-danger">
                                        @error('room_no')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            {{--Total Bed No --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Per Room Bed Size</label>
                                    <select class="form-control border-bottom" name="bed_no">
                                        <option value="">Please select bed size</option>
                                        <option value="1" {{old('bed_no')=='1' ? 'selected' : ''}}>1</option>
                                        <option value="2" {{old('bed_no')=='2' ? 'selected' : ''}}>2</option>
                                        <option value="3" {{old('bed_no')=='3' ? 'selected' : ''}}>3</option>
                                        <option value="4" {{old('bed_no')=='4' ? 'selected' : ''}}>4</option>
                                        <option value="5" {{old('bed_no')=='5' ? 'selected' : ''}}>5</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('bed_no')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            {{-- Price --}}
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Per month price</label>
                                    <input type="text" name="price" class="form-control border-bottom" value="{{old('price')}}" placeholder="0">
                                    <span class="text-danger">
                                        @error('price')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row  justify-content-center">
                           <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
    
@endsection