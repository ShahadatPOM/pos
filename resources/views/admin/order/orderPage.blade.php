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
      
      label, input[type="checkbox"]{
        color: #f73f11;
        width: 100%;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 12px; 
        font-weight: bold;
        overflow: hidden;
      }
</style>
@endpush
@section('master.content')

{{--  Search form  --}}
<div class="row">
    <div class="col-md-12">
        <form class="form-inline d-flex justify-content-center md-form form-sm active-purple-2 mt-2">
            <input id="txtSearch" class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search"
              aria-label="Search">
            <i id="searchbtn" class="fas fa-search" aria-hidden="true"></i>
          </form>
    </div>
</div>

{{--  Food Categories  --}}
<div class="row">
    <div class="col-md-2 m-3">
            @foreach($categories as $category)
        <ul style="border-left: 2px solid #f73f11;" class="list-group">
            <li class="cat list-group-item mb-1">
              <label><input type="checkbox"  class="catCheck" value="{{ $category->id }}">
                {{ $category->categoryName }}</label>  
            </li>
            </ul>
            @endforeach
    </div>
    <div class="col-md-8">
        <div id="food">

        </div>
    </div>
</div>
@endsection
@push('base.js')
    <script>
      var catSS = [];
      $(".catCheck").click(function() {
        if(this.checked) {
            catSS.push(this.value);
        }else{
            if(jQuery.inArray(this.value, catSS) !== -1){
                if (catSS.indexOf(this.value) !== -1) catSS.splice(catSS.indexOf(this.value), 1);
            }
        }
        filter();
    });

    function  filter(){
      $.ajax({
          url: "{{route('food.allFoods')}}",
          method: 'POST',
          data: {
              _token: '{{csrf_token()}}',
              catSS: catSS,
          },
          success: function(data) {
              console.log(data);
              $("#food").html(data);
          }
      });
  }


        $('#searchbtn').on('click', function(){
            alert('sfa');
            var text = $('#txtSearch').val();
            let url = "{{ route('food.food-search', ':id') }}";
            url = url.replace(':id', text);
           if(text == ""){
               alert('no data matched');
               url = "{{ route('order.orderPage') }}"
           }
            document.location.href=url;
        });
    </script>
@endpush