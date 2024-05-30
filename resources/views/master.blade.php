<?php
header("X-Robots-Tag:index, follow");
?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Deals69 - Best Deals and Discounts | Deals69</title>
    <!-- Your custom meta tags go here -->
     <meta name="description" content="Find the best deals, discounts, and coupons on Honeycomb Deals. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com">
<link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.3.2 -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  
        <link rel="stylesheet" href="{{asset('cssfile/style.css')}}">
        <link rel="stylesheet" href="{{asset('font/css/home.css')}}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
 <style>
     .body{
         background:white;
     }
     .border-rounded {
  border-radius: 15px;
}

 </style>


</head>
<body class="body">

<x-component-name/>


<!-- start caraosels! -->

  
  <!-- end caraosels! -->
  <div id="carouselExample" class="carousel slide">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="3"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="4"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 rounded" src="images/caraosel-1.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded" src="images/caraosel.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded" src="images/caraosel-2.png" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded" src="images/caraosel-1.png" alt="Fourth slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded" src="images/caraosel.png" alt="Fifth slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded" src="images/caraosel-2.png" alt="Sixth slide">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
{{-- Main Content Here --}}
@yield('main-content')
{{-- Main Content Here --}}


<!-- Include jQuery -->
<br><br><br><br>
<x-footer/>
<!-- JavaScript to handle the AJAX request -->
<script>
$(document).ready(function() {
    $('#searchInput').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{{ route("searchResults") }}',
                dataType: 'json',
                data: {
                    query: request.term
                },
                success: function(data) {
                    response(data.stores);
                }
            });
        },
        minLength:1 // Minimum characters before autocomplete starts
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>