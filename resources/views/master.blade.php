<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<title>Deals69 - Best Deals and Discounts | Deals69</title>
    <!-- Your custom meta tags go here -->
     <meta name="description" content="Find the best deals, discounts, and coupons on  Deals69. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
<link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com">


 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{asset('font/css/home.css')}}">
         <style>
     body{
         background:white;
     }
         #scrollUpBtn {
    display: none; /* Hidden by default */
    position: fixed; /* Fixed/sticky position */
    bottom: 20px; /* Place the button at the bottom of the page */
    right: 30px; /* Place the button 30px from the right */
    z-index: 99; /* Make sure it does not overlap */
    border: none; /* Remove borders */
    outline: none; /* Remove outline */
    background-color: #7158fe; /* Set a background color */
    color: white; /* Set a text color */
    cursor: pointer; /* Add a mouse pointer on hover */
    padding: 15px; /* Add some padding */
    border-radius: 10px; /* Add rounded corners */
}

#scrollUpBtn:hover {
    background-color: #555; /* Add a dark-grey background on hover */
}
 </style>

 <!-- veryfication codes  -->
 <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-VESEHB03K0"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-VESEHB03K0');
</script>

<meta name="verify-admitad" content="000c5e99a6" />
  </head>
  <body>

<button id="scrollUpBtn" title="Go to top">↑</button>
<x-component-name/>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
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
      <img class="d-block w-100 rounded" src="images/caraosel-1.png" alt="First slide" loading="lazy">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded" src="images/caraosel.png" alt="Second slide" loading="lazy">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded" src="images/caraosel-2.png" alt="Third slide"  loading="lazy">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded" src="images/caraosel-1.png" alt="Fourth slide"  loading="lazy">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded" src="images/caraosel.png" alt="Fifth slide"  loading="lazy">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 rounded" src="images/caraosel-2.png" alt="Sixth slide"  loading="lazy">
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
<script src="{{ asset('js/home.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
