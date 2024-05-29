<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Deals69 - Best Deals and Discounts | Coupons</title>
         
             <!-- Your custom meta tags go here -->
     <meta name="description" content="Find the best deals, discounts, and coupons on Honeycomb Deals. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">
         <link rel="canonical" href="https://deals69.com/coupons">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<style>
.get-deal-button,
.get-deal-button:hover {
    background-color: #17a2b8; /* Default Bootstrap info color */
    border-color: #17a2b8;
    color: #fff; /* Text color */
    padding: 10px 20px; /* Add padding */
    border-radius: 5px; /* Add border radius */
    text-decoration: none; /* Remove default text decoration */
    transition: background-color 0.3s, border-color 0.3s; /* Add transition for smoother hover effect */
}

.get-deal-button:hover {
    background-color: #138496; /* Darker shade of Bootstrap info color */
    border-color: #117a8b; /* Darker shade of Bootstrap info color */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add box shadow on hover */
}


</style>
</head>
<body>
<x-component-name/>
<br>
<div class="container bg-light">
    <div class="row mt-3 justify-content-center"> <!-- Center the pagination links -->
        <div class="col-12 bg-light text-center"> <!-- Add text-center class here -->
            {{ $coupons->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>



<div class="container">
  <div class="row">
    @foreach ($coupons as $coupon)
      <div class="col-md-4 mb-3 ">
        <div class="card mb-3 coupon-card bg-white rounded shadow-sm" >
          <div class="row g-0">
            <div class="col-md-4 shadow">
              @php
                $store = App\Models\Stores::where('name', $coupon->store)->first();
              @endphp
              @if ($store && $store->store_image)
                <img src="{{ asset('uploads/store/' . $store->store_image) }}" class="img-fluid rounded-start" alt="{{ $store->name }} Logo">
              @else
                <span class="no-image-placeholder">No Logo Available</span>
              @endif
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title coupon-title text-primary">{{ $coupon->title }}</h5>
                <p class="card-text coupon-description">{{ $coupon->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <p class="card-text coupon-discount mb-0 text-muted">Discount: {{ $coupon->discount }}</p>
                  <div class="btn-group" role="group" aria-label="Coupon Buttons">
                   
                    @if ($coupon->code)
                        <a href="#" class="btn btn-sm btn-primary get-deal-button" id="getCode{{ $coupon->id }}" onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">Code & Activate</a>
                    @else
                        <a href="{{ $coupon->destination_url }}" class="btn btn-sm btn-primary get-deal-button" target="_blank">Get Deal</a>
                    @endif
                      @if ($store)
                      <a href="{{ $store->url }}" target="_blank" class="btn btn-sm btn-outline-primary visit-store-button">Visit Store</a>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @if (($loop->index + 1) % 3 == 0)
        <div class="w-100"></div>
      @endif
    @endforeach
  </div>
</div>


                  



<x-footer/>
</body>
</html>