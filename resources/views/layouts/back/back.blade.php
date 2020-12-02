<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>POS Management System</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('back_temp/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('back_temp/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back_temp/dist/css/toastr.css') }}">
    {{--    bootstrap 5 cdn--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    {{--  Favicon  --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('back_temp/dist/img/favicon.png')}}" />

    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css
'>

    {{-- select2 --}}

    {{-- summernote --}}
    @stack('base.css')


    <style>
        [class*=sidebar-dark-] {
            background-color: #2c3e50;
        }

        .navbar-white {
            background-color: #F55;

        }

        .badge{
            font-size: 52%;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #F55;
        }

    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a style="color: #fff" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a style="color: #fff" href="#" class="nav-link">Home</a>
                </li>
            </ul>
           
           
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
               
                <!-- Notifications Dropdown Menu -->
               
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i style="color: #fff" class="far fa-bell"></i>
                        <span style="background: #2C3E50; color: #fff" class="badge navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">Notifications </span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i style="color: #f55" class="fas fa-users mr-2"></i>
                            Registration
                            <span class="float-right text-muted text-sm">
                                </span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i style="color: #f55" class="fas fa-users mr-2"></i>
                            Menuscript
                            <span class="float-right text-muted text-sm">
                                </span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i style="color: #f55" class="fas fa-users mr-2"></i>
                            Checked Menuscript
                            <span class="float-right text-muted text-sm">
                                </span>
                        </a>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                
                <!-- Notifications Dropdown Menu -->
               
            
                
        </nav>
        <!-- /.navbar -->


        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="{{ asset('back_temp/dist/img/favicon.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">POS Management</span>
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
                                <i style="color: #f55" class="fas fa-tags"></i>
                                <p>Registered Users</p>
                                <i style="color: #f55" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fas fa-plus nav-icon"></i>
                                        <p>Approved</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="far fa-circle nav-icon"></i>
                                        <p>Pending</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                      
                        {{--  Reviewer  --}}
                        {{--  <li class="nav-item has-treeview">
                            <a href="#" class=" nav-link">
                                <i style="color: #f55" class="fa fa-user-circle"></i>
                                <p>Registered Reviewer</p>
                                <i style="color: #f55" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fa fa-check nav-icon"></i>
                                        <p>Approved</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fa fa-eye-slash nav-icon"></i>
                                        <p>Pending</p>
                                    </a>
                                </li>
                            </ul>
                        </li>  --}}

                        {{--  Menuscript  --}}
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i style="color: #f55" class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                <p>Foods</p>
                                <i style="color: #f55" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fas fa-plus nav-icon"></i>
                                        <p>New Comming</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fa fa-reply nav-icon"></i>
                                        <p>Under Revision</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fa fa-share nav-icon"></i>
                                        <p>Reviewed</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fa fa-check nav-icon"></i>
                                        <p>Published</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{--  manuscript category  --}}
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i style="color: #f55" class="fa fa-arrow-circle-right"></i>
                                <p>Food Categories</p>
                                <i style="color: #f55" class="right fas fa-angle-left"></i>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="fas fa-plus nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i style="color: #f55" class="far fa-circle nav-icon"></i>
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
                                <i style="color: #f55" class="far fa-user-circle nav-icon"></i>
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
                                <i style="color: #f55" class="fas fa-sign-out-alt nav-icon"></i>
                                <p style="color: #f55; font-weight:bold; text-transform: uppercase">Logout</p>
                            </a>

                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>


            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            {{--  @include('sweetalert::alert')  --}}
            @yield('back.content')
           
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="#">Rifat</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('back_temp/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('back_temp/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('back_temp/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('back_temp/dist/js/custom-file-input.js') }}"></script>
    <script src="{{ asset('back_temp/dist/js/toastr.js') }}"></script>
    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}")
        @elseif(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}")
        @elseif(Session::has('error'))
        toastr.error("{{ Session::get('error') }}")
        @endif
        //bs-custom-file-input
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
            $(document).ready(function() {
    $('#joy').DataTable();
} );


    </script>
    {{-- select2 --}}

    {{-- summernote --}}
    @stack('base.js')
</body>

</html>
