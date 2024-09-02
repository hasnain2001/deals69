<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @if(isset($store) && is_object($store))
  <title>{!! $store->title !!}</title>
  <link rel="canonical" href="https://deals69.com/stores/{{ Str::slug($store->name) }}">
  <meta name="description" content="{!! $store->meta_description !!}">
  <meta name="keywords" content="{!! $store->meta_keyword !!}">
  <meta name="author" content="Najeeb">
  <meta name="robots" content="index, follow">
  @else
  <link rel="canonical" href="https://budgetheaven.com/store/">
  @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>

    .container{
         font-family: 'viga', sans-serif;
    font-weight: 500;
    color: #868686;
    }
 .card-hover {
    border: 2px solid #ddd;
    transition: border-color 0.3s ease;
    height: 100%; /* Adjust height to full height */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-hover:hover {
    border-color:#0dcaf0;
}

.btn-hover {
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn-hover:hover {
    background-color: #0056b3;
    color: #fff;
}

.coupon-image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px; /* Adjust height */
    margin: auto;
}

.store-image {
    max-width: 100px;
    height: 100px;
}

.coupon-card {
    display: flex;
    flex-direction: column;
    height: 100%; /* Full height of the parent */
}

.coupon-content {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
}

.coupon-details {
    flex-grow: 1;
}

.coupon-action {
    display: flex;
    justify-content: center;
    align-items: center;
}
.buttm{
    width:10px;
    height:5px;
    padding:5px;
}
.copy-btn {
    margin-top: 10px;
}

.copy-confirmation {
    margin-top: 30px;
    color: green;
}

.custom-font {
    font-family: 'viga', sans-serif;
    font-weight: bold ;
    color:#878787;

}
.des-font {
    font-family: 'Open Sans', sans-serif; /* Corrected font family name */
    font-weight: 500; /* Corrected font-weight syntax */
    color: #999999;
}
.used{
    font-family: 'Open Sans', sans-serif;
    font-weight:800;
    font-size:12px;

}




    </style>
</head>
<body>

<x-component-name/>
<br>


@if(session('success'))
<div class="alert alert-light alert-dismissable">
    <b>{{ session('success') }}</b>
</div>
@endif


<!-- Store Information and Coupons Section -->
<div class="container mt-5">
    <div class="container d-flex h-100 align-items-end">
        @if ($store)
        <h1 class="text-left">{{ $store->name }}</h1>
        @else
        <h5 style="margin-top: 0;">Store name not available</h5>
        @endif
    </div>
 <hr style="border:2px black dotted;">
    <div class="btn-group" role="group" aria-label="Sort Coupons">
            <a href="{{ url()->current() }}?sort=all" class="btn btn-outline-primary">All</a>
            <a href="{{ url()->current() }}?sort=codes" class="btn btn-outline-primary">Codes</a>
            <a href="{{ url()->current() }}?sort=deals" class="btn btn-outline-primary">Deals</a>
        </div>

    <div class="row">
        <div class="col-lg-3 mb-3">
            @if ($store)
            <div class="cpn card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2 text-center">
                            <div class="coupon-image-container">
                                <img src="{{ asset('uploads/store/' . $store->store_image) }}" alt="{{ $store->name }}" class="store-image">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="col-md" style="padding-left: 0;">
                                @if ($store)
                                <h5 style="margin-top: 0;">{{ $store->name }}</h5>
                                @else
                                <h5 style="margin-top: 0;">Store name not available</h5>
                                @endif
                                <div class="rating-stars text-warning">
                                    <i class="fas fa-star" data-rating="1"></i>
                                    <i class="fas fa-star" data-rating="2"></i>
                                    <i class="fas fa-star" data-rating="3"></i>
                                    <i class="fas fa-star" data-rating="4"></i>
                                    <i class="fas fa-star text-dark" data-rating="5"></i>
                                </div>
                                @if ($store->description)
                                <a href="{{ $store->url }}" target="_blank" class="get btn text-dark btn-hover">Visit Store</a>
                                <p class="mt-2 mx-2 store_detail_description d-none d-md-block">{!! $store->description !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <div class="col-lg-9">
      <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach ($coupons as $coupon)
    <div class="col-lg-4 col-md-6 col-sm-12 mb-5">
        <div class="coupon-card cpn card-hover">
            <div class="coupon-content p-3 flex-grow-1 d-flex flex-column justify-content-between">
                <div class="coupon-details">
         <h6 class="card-title coupon-title text-center custom-font">{{ $coupon->name }}</h6>

                    <br>
                    <p class="coupon-description des-font">{{ $coupon->description }}</p>
                     <hr style="border:2px black dotted;">
                </div>
                <div class="coupon-action text-center">
                    @if ($coupon->code)
                    <a href="{{ $coupon->destination_url }}" target="_blank" class="get btn  btn-sm btn-primary btn-hover" id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">Coupon Code</a>
                    <div class="coupon-card d-flex flex-column">
                        <span class="codeindex text-dark scratch" style="display: none;" id="codeIndex{{ $coupon->id }}">{{ $coupon->code }}</span>
                        <button class="btn btn-info text-white btn-sm copy-btn btn-hover d-none mt-2" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>
                        <p class="text-success copy-confirmation d-none mt-3" id="copyConfirmation{{ $coupon->id }}">Code copied!</p>
                    </div>
                    @else
                    <a href="{{ $coupon->destination_url }}" onclick="countClicks('{{ $coupon->id }}')" class="get btn btn-info btn-hover" target="_blank">Get Deal</a>
                    @endif

                </div>
                       <p class="used font-weight-bold mt-2" id="output_{{ $coupon->id }}">Used By: {{ $coupon->clicks }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>

        </div>
    </div>
    <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
        @csrf
        <input type="hidden" name="coupon_id" id="coupon_id">
    </form>
    <br><br>
</div>



<footer>
    @include('components.footer')
</footer>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
// Function to toggle coupon code visibility and copy button
function toggleCouponCode(couponId) {
    // Set the coupon ID in localStorage to remember the state
    localStorage.setItem('copiedCouponId', couponId);

    document.getElementById('coupon_id').value = couponId;
    document.getElementById('clickForm').submit();

    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const copyButton = document.getElementById(`copyBtn${couponId}`);

    if (codeElement.style.display === 'none') {
        codeElement.style.display = 'inline';
        copyButton.classList.remove('d-none');
    } else {
        codeElement.style.display = 'none';
        copyButton.classList.add('d-none');
    }
}

// Check localStorage on page load to restore the state
document.addEventListener('DOMContentLoaded', function() {
    const copiedCouponId = localStorage.getItem('copiedCouponId');
    if (copiedCouponId) {
        const codeElement = document.getElementById(`codeIndex${copiedCouponId}`);
        const copyButton = document.getElementById(`copyBtn${copiedCouponId}`);

        if (codeElement.style.display === 'none') {
            codeElement.style.display = 'inline';
            copyButton.classList.remove('d-none');
        } else {
            codeElement.style.display = 'none';
            copyButton.classList.add('d-none');
        }
    }
});

// Function to copy coupon code to clipboard
function copyCouponCode(couponId) {
    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const code = codeElement.innerText.trim();

    navigator.clipboard.writeText(code)
        .then(() => {
            // Show success message
            const copyMessage = document.getElementById(`copyConfirmation${couponId}`);
            copyMessage.classList.remove('d-none');
            setTimeout(() => {
                copyMessage.classList.add('d-none');
            }, 1500);
        })
        .catch(err => {
            console.error('Failed to copy: ', err);
        });
}

// Function to count clicks
function countClicks(couponId) {
    document.getElementById('coupon_id').value = couponId;
    document.getElementById('clickForm').submit();
}

</script>
</body>
</html>
