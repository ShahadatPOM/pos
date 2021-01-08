@extends('layouts.admin.master')
@push('base.css')
<style>
    .active-purple-2 input.form-control[type=text]:focus:not([readonly]) {
        border-bottom: 1px solid #f73f11;
        box-shadow: 0 1px 0 0 #f73f11;
      }
      a{
        text-decoration: none!important;
      }
      .catName{
        color: #f73f11;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 12px; 
        font-weight: bold;
      }

      .catName:hover{
          color: #f73f11;
      }

      ul li.cat{
        text-align: center; 
        word-wrap: break-word;
        border-left: 2px solid #f73f11;
      }
</style>
@endpush
@section('master.content')

{{--  Search form  --}}
<form class="form-inline d-flex justify-content-center md-form form-sm active-purple-2 mt-2">
  <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
    aria-label="Search">
  <i class="fas fa-search" aria-hidden="true"></i>
</form>


{{--  Food Categories  --}}
<div class="row">
    <div class="col-md-2 m-3">
        <ul class="list-group">
            <li class="cat list-group-item mb-1" aria-current="true"><a class="catName" href="">All Foods</a></li>
            @foreach($categories as $category)
            <li class="cat list-group-item mb-1"><a class="catName" href="">{{ $category->categoryName }}</a></li>
            @endforeach
          </ul>        
    </div>
</div>
@endsection