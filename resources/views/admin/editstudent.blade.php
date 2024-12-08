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
 <div class="container"> 

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold">Edit Student Registration</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-uppercase text-black font-weight-bold">Update Student Information</h4>
                    <hr>
                    <!--Include alert file-->
                    @include('include.alert')

                    <form action="{{route('updatestudent', $data->id)}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="row border p-1 mb-1">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{$data->name}}" class="form-control">
                                    <span class="text-danger">
                                        @error('name')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control" value="{{$data->address}}">
                                    <span class="text-danger">
                                        @error('address')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Date of Birth <span class="text-danger">*</span></label>
                                    <input type="date" name="dob" class="form-control" value="{{$data->dob}}">
                                    <span class="text-danger">
                                        @error('dob')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" @if($data->gender == 'male') selected @endif>Male</option>
                                        <option value="female" @if($data->gender == 'female') selected @endif>Female</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('gender')
                                          {{$message}}  
                                        @enderror
                                    </span>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Contact_No <span class="text-danger">*</span></label>
                                    <input type="text" name="contact" class="form-control" value="{{$data->contact_no}}">
                                    <span class="text-danger">
                                        @error('contact')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-black font-weight-bold">Guardian Name <span class="text-danger">*</span></label>
                                    <input type="text" name="gname" class="form-control"  value="{{$data->gname}}">
                                    <span class="text-danger">
                                        @error('gname')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-black font-weight-bold">Guardian Relation <span class="text-danger">*</span></label>
                                    <input type="text" name="grelation" class="form-control" value="{{$data->grelation}}">
                                    <span class="text-danger">
                                        @error('grelation')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-black font-weight-bold">Guardian Contact No <span class="text-danger">*</span></label>
                                    <input type="number" name="gphone" class="form-control " value="{{$data->gcontact_no}}">
                                    <span class="text-danger">
                                        @error('gphone')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                        </div>
    
    
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('managestudent') }}" class="btn btn-secondary">Cancel</a>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
    