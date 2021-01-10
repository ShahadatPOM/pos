

<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>
</head>
<body>
    {{-- <form action="{{ route('food.selectedFoods') }}" method="post"> --}}
        {{-- @csrf --}}
        {{-- <input type="number" name="quantity" id="qty" placeholder="quantity"> --}}
        <div style="margin-top: 10px" class="col-xl-9 col-lg-8 col-md-8 col-sm-9">
          <div style="margin-bottom: 10px" class="custom-qty">
              <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) result.value--;return false;"
                      class="reduced items" type="button"><i class="fa fa-minus"></i> </button>
              <input type="text" class="input-text qty" title="Qty" value="1" maxlength="8" id="qty" name="qty">
              <button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;"
                      class="increase items" type="button"> <i class="fa fa-plus"></i></button>
          </div>
      </div>
    @foreach($foods as $food)
    <div class="gallery">
        <a class="foodCheck" target="" href="#">
            {{-- <input class="foodId" type="hidden" name="foodId[]" value="{{ $food->id }}"> --}}
          <img src="{{ asset('food/'.$food->food_image) }}" class="img-fluid" alt="Food Image">
        </a>
        <div style="text-align: center; padding-top:2px">{{ $food->foodName }}</div>
        <div class="" style="text-align: center; padding-top:2px">Price: {{ $food->price }}tk</div>
        <a href="#" onclick="addToCart({{$food->id}})" title="Add to Cart"  class="btn btn-primary"><i class="fa fa-shopping-basket"></i></a>
      
    </div>

      @endforeach
      {{-- <button type="submit" value="Submit">Submit</button> --}}
    {{-- </form> --}}

</body>
</html>

<script>
   
  </script>


