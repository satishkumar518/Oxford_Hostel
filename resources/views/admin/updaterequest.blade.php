<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Update Request</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="../../assets/css2/bootstrap-creative.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="../../assets/css2/app-creative.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />
    <!-- icons -->
    <link href="../../assets/css2/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="../../stylesheet" href="assets/style.css">
</head>

<body>
 <!-- Start Content-->
 <div class="container"> 

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold">Update Request</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-uppercase text-black font-weight-bold">Update Request Information</h4>
                    <hr>
                    <!--Include alert file-->
                    @include('include.alert')

                    <form action="{{route('updateSubmit', $data->id)}}" method="post">
                        @csrf 
                        <div class="row border p-1 mb-1">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Floor</label>
                                    <input type="text" name="floor" class="form-control bg-secondary text-white" value="{{$data->floor}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Student Name</label>
                                    <input type="text" name="address" class="form-control bg-secondary text-white" value="{{$data->name}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Duration</label>
                                    <input type="text" name="duration" class="form-control bg-secondary text-white" value="{{$data->duration}}" readonly>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Amount</label>
                                    <input type="text" name="amount" class="form-control bg-secondary text-white" value="{{$data->price}}" readonly> 
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Start Date<span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" class="form-control " value="{{old('start_date')}}">
                                    <span class="text-danger">
                                        @error('start_date')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-black font-weight-bold">Room No<span class="text-danger">*</span></label>
                                    <select class="form-control" name="room_no">
                                        <option value="">Please choose room</option>
                                        @for($i=1; $i<=$total_room; $i++)
                                        <option value="Room-{{$i}}" @if($data->room_no == '{{$i}}') selected @endif>Room-{{$i}}</option>
                                        @endfor
                                    </select>
                                    <span class="text-danger">
                                        @error('room_no')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-black font-weight-bold">Bed No<span class="text-danger">*</span></label>
                                    <select class="form-control" name="bed_no">
                                        <option value="">Please choose bed</option>
                                        @for($i=1; $i<=$total_bed; $i++)
                                        <option value="Bed-{{$i}}" @if($data->bed == '{{$i}}') selected @endif>Bed-{{$i}}</option>
                                        @endfor
                                    </select>
                                    <span class="text-danger">
                                        @error('bed_no')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                        </div>
    
    
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('manageRequest') }}" class="btn btn-secondary">Cancel</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
    