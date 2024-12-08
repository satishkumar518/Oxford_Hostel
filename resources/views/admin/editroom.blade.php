<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
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
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold text-uppercase"> Edit Room </h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- Start Form  -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!--Include alert file-->
                    @include('include.alert')

                    <h4 class="header-title text-uppercase">Edit Room</h4>
                    <h6 class="text-danger">All field is required</h6>
                    <hr>
                    <form method="post" action="{{route('updateroom', $data->id)}}">
                        @csrf
                        <div class="row">
                            {{-- Floor --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Floor</label>
                                    <select class="form-control border-bottom" name="floor" id="floor-select">
                                        <option value="">Please select floor</option>
                                        <option value="Ground Floor" @if($data->floor == 'Ground Floor') selected @endif >Ground Floor</option>
                                        <option value="1st Floor" @if($data->floor == '1st Floor') selected @endif>1st Floor</option>
                                        <option value="2nd Floor" @if($data->floor == '2nd Floor') selected @endif>2nd Floor</option>
                                        <option value="3rd Floor" @if($data->floor == '3rd Floor') selected @endif>3rd Floor</option>
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
                                <div class="form-group mb-3">
                                    <label>Total Room Number</label>
                                    <input type="text" name="room_no" class="form-control border-bottom" value="{{$data->total_room}}">
                                    <span class="text-danger">
                                        @error('room_no')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            {{--Total Bed No --}}
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Per Room Bed Size</label>
                                    <select class="form-control border-bottom" name="bed_no">
                                        <option value="">Please select bed size</option>
                                        <option value="1" @if($data->total_bed == '1') selected @endif >1</option>
                                        <option value="2" @if($data->total_bed == '2') selected @endif>2</option>
                                        <option value="3" @if($data->total_bed == '3') selected @endif>3</option>
                                        <option value="4" @if($data->total_bed == '4') selected @endif>4</option>
                                        <option value="5" @if($data->total_bed == '5') selected @endif>5</option>
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
                                <div class="form-group mb-3">
                                    <label>Per month price</label>
                                    <input type="text" name="price" class="form-control border-bottom" value="{{$data->price}}">
                                    <span class="text-danger">
                                        @error('price')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>



                        <br>

                        <button class="btn btn-primary" type="submit">Update</button>
                        <a href="{{ route('manageroom') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    
</body>
</html>



