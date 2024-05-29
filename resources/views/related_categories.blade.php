
<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          <title>Deals69 - Best Deals and Discounts |Categories</title>
    <!-- Your custom meta tags go here -->
     <meta name="description" content="Find the best deals, discounts, and coupons on Honeycomb Deals. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/categories">
<link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-A/oxWIdYLO6gLcSQpUp9Uv9N6YMy4N4o+sjg2b+j5gZaTq6H2DtBvFKd6uPzhBXRtby7zxaYYEF5cL29KC5sag==" crossorigin="anonymous" />

<style>
    .body{
background-color:#fff;
}
.container {
max-width: 1200px;
margin: auto;
padding: 20px;
}

.bg-light {
background-color: #f8f9fa;
}

.card-list {
display: flex;
flex-wrap: wrap;
justify-content: space-around;
align-items: center;
}

.card-list a {
text-decoration: none;
color: inherit;
width: 100%;
max-width: 200px;
margin-bottom: 20px;
padding: 10px;
border-radius: 5px;

transition: all 0.3s ease;
}

.card-list a:hover {
box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.stores {
width: 100%;
height: auto;
border-radius: 60%;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
transition: transform 0.3s ease;
}
.stores:hover {
transform: scale(1.05);
}
.card-title {
text-align: center;
margin-top: 10px;
font-size: 1.2rem;
font-weight: bold;
}

@media (min-width: 768px) {
.card-list {
    justify-content: flex-start;
}

.card-list a {
    width: calc(25% - 20px);
    margin-right: 20px;
    margin-bottom: 20px;
}

.card-list a:nth-child(4n) {
    margin-right: 0;
}
}</style>
</head>
<body>
    <x-component-name/>
    <div class="container">
        <div class="card-list ">
            @foreach ($stores as $store)
            <a href="{{ route('store_details', ['name' => Str::slug($store->name)]) }}" class="text-decoration-none">
                <img class="stores shadow " src="{{ $store->store_image ? asset('uploads/store/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}" alt="Card Image">
              
                    <h5 class="card-title mt-3 mx-2">{{ $store->name ?: "Title not found" }}</h5>
             
            </a>
            @endforeach
        </div>
    </div>
   

    <x-footer/>

        <script>
            function openCouponInNewTab(url, couponId) {
                window.open(url, '_blank');
                var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
                modal.show();
            }
        </script>
</body>
</html>