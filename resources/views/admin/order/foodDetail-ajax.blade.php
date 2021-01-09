

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
    @foreach($foods as $food)
    <div class="gallery">
        <a target="_blank" href="#">
          <img src="{{ asset('food/'.$food->food_image) }}" class="img-fluid" alt="Food Image">
        </a>
        <div class="desc">{{ $food->foodName }}</div>
      </div>
      @endforeach
</body>
</html>
