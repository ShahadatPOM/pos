<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>POS-Management-System</title>

    {{--  Font Awesome Icons  --}}
    <link rel="stylesheet" href="{{ asset('back_temp/plugins/fontawesome-free/css/all.min.css') }}">

    {{--  Theme style  --}}
    <link rel="stylesheet" href="{{ asset('back_temp/dist/css/adminlte.min.css') }}">

    {{--  Google Font: Source Sans Pro  --}}
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('back_temp/dist/css/toastr.css') }}">

    {{--  bootstrap 5 cdn  --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>

    {{--  Favicon  --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('front_temp/images/favicon.ico')}}" />

    {{--  Datatable  --}}
    <link rel='stylesheet' href='https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css'>
    {{--  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">  --}}

    @stack('base.css')

    <style>
        [class*=sidebar-dark-] {
            background-color: #222222;
        }

        .navbar-white {
            background-color: #E75B1E;

        }

        .badge{
            font-size: 52%;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #E75B1E;
        }

    </style>
</head>


{{--  body part  --}}
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
                @yield('base.content')
            </div>
        </div>
    {{--  end body  --}}
    </div> 
    {{--  wrapper end  --}}


    {{--  REQUIRED SCRIPTS  --}}

    {{--  jQuery  --}}
    <script src="{{ asset('back_temp/plugins/jquery/jquery.min.js') }}"></script>

    {{--  Bootstrap 4  --}}
    <script src="{{ asset('back_temp/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{--  AdminLTE App  --}}
    <script src="{{ asset('back_temp/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('back_temp/dist/js/custom-file-input.js') }}"></script>
    <script src="{{ asset('back_temp/dist/js/toastr.js') }}"></script>

    {{--  Datatable  --}}
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    {{--  toastr  --}}
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

    </script>

    @stack('base.js')
</body>

</html>
