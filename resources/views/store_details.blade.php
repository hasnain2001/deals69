<?php
header("X-Robots-Tag:index, follow");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@if(isset($store) && is_object($store))
     <title>{!! $store->meta_tag !!}</title>
    <link rel="canonical" href="https://deals69.com/store/{{ Str::slug($store->name) }}">
        <meta name="description" content="{!! $store->meta_description !!}">

 <meta name="keywords" content="{!! $store->meta_keyword !!}">
 
  <meta name="author" content="Najeb-ullah khan">
 <meta name="robots" content="index, follow">

@else
    <!-- Handle the case where $store is not valid -->
    <!-- You can display a default canonical URL or handle it in another appropriate way -->
    <link rel="canonical" href="https://www.honeycombdeals.com">
@endif
<link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
<link rel="stylesheet" href="{{asset('cssfile/styles.css')}}">
    <link rel="stylesheet" href="{{asset('cssfile/styles.css')}}">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-njBmYjFk5oaxU1n9TKX8IhZM1RB1qfF8MmUki6k/6WKDI7YLMUG1AN5cOrFNYZvE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-njBmYjFk5oaxU1n9TKX8IhZM1RB1qfF8MmUki6k/6WKDI7YLMUG1AN5cOrFNYZvE" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/v4-shims.min.js" integrity="sha512-1eyBIzeEcxyxJkTmQIGLrXo2AK9DVykziyPi7JkNR61HNC8y87OeqQFqvRwgwnqJpjxfUj43Fup0szvPrR3Ilg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Add this line to your HTML file to include FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
/* Custom button styles */
/* Custom button styles */
.custom-btn {
  display: inline-block;
  padding: 15px 30px; /* Increased padding for better readability */
  border: none;
  border-radius: 50px; /* Larger rounded corners for a more modern look */
  font-size: 18px;
  font-weight: bold;
  text-transform: uppercase;
  text-decoration: none;
  color: #fff;
  background-color: #38a3a5; /* Base color with a slight shift for more vibrancy */
  box-shadow: 5px 20px 5px rgba(0, 0, 0, 0.15); /* Increased shadow for more depth */
  transition: all 0.3s ease; /* Transition all properties for smoother animation */
}

.custom-btn:hover {
    color: #fff;
  background-color: #5b58be; /* Updated hover color with a brighter green */
  transform: translateY(-4px); /* Increased hover lift for a more pronounced effect */
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); /* Increased shadow on hover for emphasis */
}


</style>
  </head>
  <body>
      
      <x-component-name/>
<br><br><br>
  @if ($store)
  <div class="container d-flex h-100 align-items-end">
    <h1 class="text-left">{{ $store->name }} Store</h1>
  </div>
<div class="container">

   <div class="row">
        <div class="col-lg-3 mb-3">
          
            <div class="card">
                <div class="card-body">
                    <img src="{{ asset('uploads/store/' . $store->store_image) }}" alt="{{ $store->name }}" class="img-fluid rounded-circle">
                    <div class="col-md" style="padding-left: 0;">
                        <h5 style="margin-top: 0;">{{ $store->name }}</h5>
                        <div class="rating-stars">
                            <i class="fas fa-star" data-rating="1"></i>
                            <i class="fas fa-star" data-rating="2"></i>
                            <i class="fas fa-star" data-rating="3"></i>
                            <i class="fas fa-star" data-rating="4"></i>
                            <i class="fas fa-star" data-rating="5"></i>
                        </div>
                        <a href="{{ $store->url }}" target="_blank" class="custom-btn">Visit Store</a>
                        @if ($store->description)
                        <p class="mt-2 mx-2 store_detail_description d-none d-md-block">{!! $store->description !!}</p>

                        @endif
                       
                    </div>
                </div>
            </div>
            @endif
        </div>

<div class="col-lg-9">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                 @foreach ($coupons as $coupon)
                 <div class="col">
                    <div class="card h-100">
                        <div class="row g-0">
                            <div class="col-md-4">
                @php
                    $store = App\Models\Stores::where('name', $coupon->store)->first();
                @endphp
                @if ($store && $store->store_image)
                    <img src="{{ asset('uploads/store/' . $store->store_image) }}" alt="{{ $store->name }} Image" class="img-fluid rounded-start" style="max-width: 100%; max-height: 100px;">
                @else
                    <span class="no-image-placeholder">No Image Available</span>
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ trim($coupon->name) }}</h5>

                    @if ($coupon->description)
                        <p class="card-text">{!! $coupon->description !!}</p>
                    @endif
                        @if ($coupon->code)
                        <a href="#" class="custom-btn" id="getCode{{ $coupon->id }}" onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">
                        <i class="fas fa-gift me-2"></i> Code & Activate
                        </a>
                    @else
                        <a href="{{ $coupon->destination_url }}" class="custom-btn" target="_blank">
                        Get Deal <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    @endif
                  
                  
                  
                  
                  
                  
                  
                

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="codeModal{{ $coupon->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $coupon->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel{{ $coupon->id }}">{{ $coupon->name }}</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>{{ $coupon->code ? $coupon->code : "Code not found" }}</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-dark" onclick="copyCoupon('{{ $coupon->code }}')">Copy</button>
            </div>
        </div>
    </div>
</div>


        @endforeach
    </div>
</div>


    </div>
</div>


<br><br><br>
<x-footer/>
<script>
    function copyCoupon(code) {
        navigator.clipboard.writeText(code)
            .then(() => {
                alert("Coupon code copied!");
            })
            .catch((error) => {
                console.error("Failed to copy: ", error);
            });
    }
</script>

    <script>
        function openCouponInNewTab(url, couponId) {
            window.open(url, '_blank');
            var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
            modal.show();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>