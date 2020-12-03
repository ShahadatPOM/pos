@extends('layouts.back.base')
@section('base.content')

@include('layouts.back.partial.header')

@include('layouts.back.partial.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    {{--  @include('sweetalert::alert')  --}}
    @yield('master.content')
   
</div>
<!-- /.content-wrapper -->

<!-- /.Footer -->
@include('layouts.back.partial.footer')

@endsection