

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
    <form action="{{ route('food.selectedFoods') }}" method="post">
        @csrf
    @foreach($foods as $food)
    <div class="gallery">
        <a class="foodCheck" target="" href="#">
            <input class="foodId" type="hidden" name="foodId[]" value="{{ $food->id }}">
            <input type="number" name="quantity[]" placeholder="quantity">
          <img  src="{{ asset('food/'.$food->food_image) }}" class="img-fluid" alt="Food Image">
        </a>
        <div style="text-align: center; padding-top:2px">{{ $food->foodName }}</div>
        <div class="" style="text-align: center; padding-top:2px">Price: {{ $food->vat }}tk</div>
      </div>
      @endforeach
      <button type="submit" value="Submit">Submit</button>
    </form>

</body>
</html>

<script>
   
  </script>


