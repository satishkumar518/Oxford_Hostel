  <!-- Start Content-->
<div class="container"> 

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title font-weight-bold">Student Registration</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-uppercase text-black font-weight-bold">Fill All Information</h4>
                    <h6 class="text-danger">All field is required</h6>
                    <hr>
                    <!--Include alert file-->
                    @include('include.alert')

                    <form action="{{route('student_register_sumbit')}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="row border p-1">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Full Name</label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control">
                                    <span class="text-danger">
                                        @error('name')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                                    <span class="text-danger">
                                        @error('address')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" value="{{old('dob')}}">
                                    <span class="text-danger">
                                        @error('dob')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male" {{old('gender')=='male' ? 'selected': ''}}>Male</option>
                                        <option value="female" {{old('gender')=='female' ? 'selected': ''}}>Female</option>
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
                                    <label class="text-black font-weight-bold">Email-Id</label>
                                    <input type="text" name="email" class="form-control" placeholder="abc12@example.com" value="{{old('email')}}">
                                    <span class="text-danger">
                                        @error('email')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Contact_No</label>
                                    <input type="text" name="contact" class="form-control" value="{{old('contact')}}">
                                    <span class="text-danger">
                                        @error('contact')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label class="text-black font-weight-bold">Choose Image</label>
                                    <input type="file" name="image" class="form-control" value="{{old('image')}}">
                                    <span class="text-danger">
                                        @error('image')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-black font-weight-bold">Guardian Name</label>
                                    <input type="text" name="gname" class="form-control"  placeholder="Enter guardian name" value="{{old('gname')}}">
                                    <span class="text-danger">
                                        @error('gname')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label class="text-black font-weight-bold">Guardian Relation</label>
                                    <input type="text" name="grelation" class="form-control" value="{{old('grelation')}}">
                                    <span class="text-danger">
                                        @error('grelation')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-black font-weight-bold">Guardian Contact No</label>
                                    <input type="number" name="gphone" class="form-control " value="{{old('gphone')}}">
                                    <span class="text-danger">
                                        @error('gphone')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="text-black font-weight-bold">Password</label>
                                    <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                    <span class="text-danger">
                                        @error('password')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group ">
                                    <label class="text-black font-weight-bold">Confirm-Password</label>
                                    <input type="password" name="confirm_password" class="form-control" value="{{old('confirm_password')}}">
                                    <span class="text-danger">
                                        @error('confirm_password')
                                          {{$message}}  
                                        @enderror
                                    </span>
                                </div>
                            </div>

                        </div>
    
                        <div class="row mt-1 justify-content-center">
                            <div class="col-md-2">                            
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
