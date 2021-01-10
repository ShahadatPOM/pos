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

                <img src="{{ asset('profile/'. Auth::user()->image) }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a style="text-transform: capitalize;" href="{{ route('user.profile', Auth::id()) }}" class="d-block">@auth{{Auth::user()->name}}@endauth</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column co" data-widget="treeview" role="menu"
                data-accordion="false">

                    {{--  Order  --}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                          <i style="color: #E75B1E" class="fab fa-jedi-order"></i>
                        <p>Manage Order</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('order.orderPage') }}" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>Take Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('order.list') }}" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Order List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Pending Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Complete Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Cancel Order</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--  Reservation  --}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i style="color: #E75B1E" class="fab fa-resolving"></i>
                        <p>Reservation</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>Add Booking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Booking List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Category Management --}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                      <i style="color: #E75B1E" class="fas fa-transgender-alt"></i>
                        <p>Category Management</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('category.create') }}" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--  Food Management  --}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i style="color: #E75B1E" class="fas fa-utensils"></i>
                        <p>Food Management</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                   
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('food.create') }}" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>Add Food</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('food.index') }}" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Food List</p>
                            </a>
                        </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ route('variant.index') }}" class="nav-link">
                                        <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                        <p>Food Varient</p>
                                    </a>
                                </li>                             --}}
                         
                        {{-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Manage Addons</p>
                                <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                        <p>Add Add-ons</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                        <p>Add-ons List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                        <p>Add-ons Assign List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                        <p>Food Availability</p>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    </ul>
                </li>

                {{--  Report  --}}
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i  style="color: #E75B1E" class="far fa-clipboard"></i>
                        <p>Report</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>Sell Report</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--  Default  --}}
                <li class="nav-header">Default</li>
                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link">
                        <i style="color: #E75B1E"  class="far fa-user"></i>
                        <p>User</p>
                        <i style="color: #E75B1E" class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color: #E75B1E" class="fas fa-plus nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i style="color:#E75B1E" class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.profile', Auth::id()) }}" class="nav-link">
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