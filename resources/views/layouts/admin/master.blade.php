@extends('layouts.admin.base')
@section('base.content')

@include('layouts.admin.partial.header')

@include('layouts.admin.partial.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    {{--  @include('sweetalert::alert')  --}}
    @yield('master.content')
   
</div>
<!-- /.content-wrapper -->

<!-- /.Footer -->
@include('layouts.admin.partial.footer')

@endsection