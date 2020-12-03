<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('front_temp/images/logo.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Management System</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="#" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a style="text-transform: capitalize;" href="{{ url('profile', Auth::id()) }}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column co" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
                {{--  Users  --}}
                
                {{--  {{ dd(Auth::user()->user_type_id)}} --}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i style="color: #E75B1E" class="fas fa-tags"></i>
                        <p>Registered Users</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>Approved</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Pending</p>
                            </a>
                        </li>
                    </ul>
                </li>
              
                
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i style="color:#E75B1E" class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        <p>Foods</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>New Comming</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fa fa-reply nav-icon"></i>
                                <p>Under Revision</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fa fa-share nav-icon"></i>
                                <p>Reviewed</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fa fa-check nav-icon"></i>
                                <p>Published</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--  manuscript category  --}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i style="color:#E75B1E" class="fa fa-arrow-circle-right"></i>
                        <p>Food Categories</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="far fa-circle nav-icon"></i>
                                <p>List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
          
                {{--  <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i style="color: #f55" class="fas fa-tags"></i>
                        <p>Manuscripts</p>
                        <i style="color: #f55" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #f55" class="fas fa-plus nav-icon"></i>
                                <p>Assigned</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #f55" class="fas fa-plus nav-icon"></i>
                                <p>Checked</p>
                            </a>
                        </li>
                    </ul>
                </li>  --}}
                
                <li class="nav-header">Your Account</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i style="color: #E75B1E" class="far fa-user-circle nav-icon"></i>
                        <p>Profile</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();" class=" nav-link">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                        <i style="color: #E75B1E" class="fas fa-sign-out-alt nav-icon"></i>
                        <p style="color: #E75B1E; font-weight:bold; text-transform: uppercase">Logout</p>
                    </a>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>


    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->