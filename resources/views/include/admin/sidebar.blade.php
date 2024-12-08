<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="h-100" data-simplebar>


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="{{route('Admin_Dashboard')}}">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Manage Room </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('addroom')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Add
                                    New Room</a>
                            </li>

                            <li>
                                <a href="{{route('manageRequest')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage
                                    Request</a>
                            </li>
                            
                            <li>
                                <a href="{{route('manageroom')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage
                                    Rooms</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#SidebarMS" data-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Manage Student </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="SidebarMS">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{route('addstudent')}}"><i data-feather="plus" class="pr-0 mr-1"></i>Student Registration</a>
                            </li>
                            <li>
                                <a href="{{route('managestudent')}}"><i data-feather="list" class="pr-0 mr-1"></i>Manage Student</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{route('viewPayment')}}"><i class="fa fa-eye "></i>Payment Details</a>
                </li>
                
                <li>
                    <a href="{{route('StudentBookingDetails')}}">
                        <i class="fa fa-eye "></i>
                        <span> View Booking Details </span>
                    </a>
                    
                </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>
<!-- Left Sidebar End -->
