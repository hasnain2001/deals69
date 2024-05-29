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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-A/oxWIdYLO6gLcSQpUp9Uv9N6YMy4N4o+sjg2b+j5gZaTq6H2DtBvFKd6uPzhBXRtby7zxaYYEF5cL29KC5sag==" crossorigin="anonymous" />


  
        <link rel="stylesheet" href="{{asset('cssfile/style.css')}}">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
 <style>
     .body{
         background:white;
     }
 </style>


</head>
<body class="body">

<x-component-name/>


<!-- start caraosels! -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/caraosel-1.png" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/caraosel.png" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/caraosel-2.png" alt="Third slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/caraosel-1.png" alt="Fourth slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/caraosel.png" alt="Fifth slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/caraosel-2.png" alt="Sixth slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
  </div>
  
  <!-- end caraosels! -->
  

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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
         

 <!-- Include Owl Carousel CSS -->
 <!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>




<!-- Include Owl Carousel JavaScript -->   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- Initialize Owl Carousel -->

<script src="{{ asset('front/assets/js/script.js') }}"></script>
@yield('scripts')
</body>
</html>