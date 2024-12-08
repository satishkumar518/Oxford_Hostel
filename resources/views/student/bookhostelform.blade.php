@extends('layout.student.dashlayout')
@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold text-uppercase">Book Room</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Start Form  -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    @include('include.alert')

                    <h4 class="header-title text-uppercase"> Book Room</h4>
                    <h6 class="text-danger">All field is required*</h6>
                    <hr>
                    <form  method="post" action="{{route('bookroom')}}">
                        @csrf
                        <div class="row">
                            {{-- Floor --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Floor</label>
                                    <select class="form-control border-bottom" name="floor">
                                        <option value="">Please select floor</option>
                                        @foreach ($datas as $data1)
                                            <option value="{{$data1->floor}}">{{$data1->floor}}</option> 
                                        @endforeach 
                                    </select>
                                    <span class="text-danger">
                                        @error('floor')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                    
                                </div>
                            </div>

                            {{-- Duration --}}
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Duration</label>
                                    <select class="form-control border-bottom" name="duration">
                                        <option value="">Please select duration</option>
                                        <option value="1" {{old('duration')=='1' ? 'selected' : ''}}>1 Month</option>
                                        <option value="3" {{old('duration')=='3' ? 'selected' : ''}}>3 Month</option>
                                        <option value="6" {{old('duration')=='6' ? 'selected' : ''}}>6 Month</option>
                                        <option value="9" {{old('duration')=='9' ? 'selected' : ''}}>9 Month</option>
                                        <option value="12" {{old('duration')=='12' ? 'selected' : ''}}>12 Month</option>  
                                    </select>
                                    <span class="text-danger">
                                        @error('duration')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                    
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Start From</label>
                                    <input type="date" name="start_date" class="form-control border-bottom " value="{{old('start_date')}}" id="start_date">
                                    <span class="text-danger">
                                        @error('start_date')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <script>
                                var today = new Date();
                                var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate()+2).toISOString().split('T')[0];
                                document.getElementById('start_date').setAttribute('min', minDate);
                            </script>

                            
                        </div>
                       

                        <button class="btn btn-primary" type="submit">Book Now</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </div>
        
       {{-- col 6 --}}
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-uppercase">View Details</h4>
                    <hr>
                        <div class="row justify-content-center">
                            @foreach ($datas as $data)
                            <div class="col-md-12 ">
                                <div>
                                    <tr><h5>{{$data->floor}}</h5></tr>
                                    <tr>
                                        <td>Total Room Available:</td>
                                        <td>{{$data->total_room}}</td>
                                    </tr><br>
                                    <tr>
                                        <td>Total Bed Available:</td>
                                        <td>{{$data->total_bed}}</td>
                                    </tr><br>
                                    <tr>
                                        <td>Per Month Price:</td>
                                        <td>{{$data->price}}</td>
                                    </tr>
                                </div><hr> 
                            </div>  
                            @endforeach  
                        </div>
                   
                </div>
            </div>
        </div>
        {{-- col-6 --}}
    </div>

</div>
    
@endsection