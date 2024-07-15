<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if(isset($store) && is_object($store)) {!! $store->title !!} @else Deals69 @endif</title>
    <meta name="description" content="@if(isset($store) && is_object($store)) {!! $store->meta_description !!} @endif">
    <meta name="keywords" content="@if(isset($store) && is_object($store)) {!! $store->meta_keyword !!} @endif">
    <meta name="author" content="Najeb-ullah khan">
    <meta name="robots" content="index, follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Store Information Card Styles */
        .store-info-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            transition: box-shadow 0.3s ease;
        }
        .store-info-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .store-info-card .logo {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }
        .store-info-card .star-rating {
            color: #ffcc00;
        }
        .store-info-card .star-rating i {
            font-size: 1.2em;
        }
        .store-info-card .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }
        .store-info-card .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }

        /* Coupon Card Styles */
        .coupon-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        .coupon-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .coupon-card .card-body {
            display: flex;
            align-items: center;
            height: 150px;
        }
        .coupon-card .logo {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        .coupon-card .card-title {
            font-size: 1.5em;
            margin-bottom: 0.5em;
        }
        .coupon-card .font-italic {
            font-style: italic;
            color: #555;
        }
        .cpnCode {
            font-weight: bold;
            font-size: 1.1em;
        }
        .btn-outline-info, .btn-outline-success {
            border-width: 2px;
        }
        .btn-outline-info:hover, .btn-outline-success:hover {
            background-color: transparent;
            border-width: 2px;
        }
        .card-text {
            font-size: 0.9em;
            color: #777;
        }
        .alert-success {
            font-size: 0.9em;
            padding: 0.5em;
            border-radius: 5px;
        }
        .text-danger {
            color: #dc3545 !important;
        }
        .text-muted {
            color: #6c757d !important;
        }
        .scratch {
            background: linear-gradient(90deg, #e0e0e0 0%, #e0e0e0 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            cursor: pointer;
            position: relative;
        }
        .scratch.revealed {
            -webkit-text-fill-color: initial;
            background: none;
            cursor: default;
        }
        .gray {
            width: 70px;
            height: 50px;
            border-radius: 0% 95% 0% 0%;
            z-index: 1;
            position: absolute;
            top: 0;
            left: 0;
        }
        .dnone {
            display: none;
        }
    </style>
</head>
<body>

<x-component-name/>
<br>
<div class="container">
    @if ($store)
        <h1 class="text-left">{{ $store->name }}</h1>
    @endif
</div>

@if(session('success'))
<div class="alert alert-light alert-dismissable">
    <b>{{ session('success') }}</b>
</div>
@endif
<div class="container">
<div class="btn-group" role="group" aria-label="Sort Coupons">
            <a href="{{ url()->current() }}?sort=all" class="btn btn-outline-primary">All</a>
            <a href="{{ url()->current() }}?sort=codes" class="btn btn-outline-primary">Codes</a>
            <a href="{{ url()->current() }}?sort=deals" class="btn btn-outline-primary">Deals</a>
        </div>


</div>

<!-- Store Information and Coupons Section -->
<div class="container">
    <div class="row">
        <!-- Coupons Section -->
        <div class="col-md-8">
            <div class="row row-cols-1 row-cols-md-1">
                @foreach ($coupons as $coupon)
                <div class="col mb-4">
                    <div class="coupon-card card shadow-sm p-3 mb-5 bg-white rounded h-100">
                        <div class="card-body d-flex align-items-center">
                            <div class="d-flex flex-shrink-0 align-items-center position-relative">
                                @if ($store->store_image)
                                <div class="text-center mb-3">
                                    <img src="{{ asset('uploads/store/' . $store->store_image) }}" class="logo img-fluid rounded-circle" alt="{{ $store->name }}">
                                </div>
                                <div class="gray"></div>
                                @endif
                            </div>
                            <div class="flex-grow-1 ml-3">
                                <h3 class="card-title">{{ $coupon->name }}</h3>
                                <p class="font-italic">{{ $coupon->description }}</p>
                            </div>
                            <div class="ml-auto text-right"> <!-- Adjust alignment to the right -->
                                @if ($coupon->code)
                                @php $codeCount++; @endphp
                                <div class="mb-2">
                                    <a href="{{ $coupon->destination_url }}" target="_blank" class="btn btn-outline-info" id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">Coupon Code</a>
                                    <span id="codeIndex{{ $coupon->id }}" class="badge text-dark scratch">{{ $coupon->code }}</span>
                                    <button class="btn btn-info ml-2 d-none" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>

                                </div>
                                @else
                                @php $dealCount++; @endphp
                                <div class="mb-2">
                                    <a href="{{ $coupon->destination_url }}" class="btn btn-outline-success" target="_blank" onclick="countClicks('{{ $coupon->id }}')">Get Deal</a>
                                    <p class="used" id="output_{{ $coupon->id }}">Used By: {{ $coupon->clicks }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div id="copyMessage{{ $coupon->id }}" class="alert alert-success mt-2 d-none">Code copied successfully!</div>
                    </div>
                </div>
                @endforeach
            </div>
            <form method="post" action="{{ route('update.clicks') }}" id="clickForm">
                @csrf
                <input type="hidden" name="coupon_id" id="coupon_id">
            </form>


            <!-- Totals Section, only visible on desktop -->
            <div class="totals mt-3 d-none d-lg-block">
                <div class="p-3 border rounded" style="background-color: #f8f9fa;">
                    <div class="row align-items-center">
                        <div class="col text-start">
                            <p style="font-size: 1.2em; margin: 0;">
                                <i class="fas fa-tag me-2"></i> Codes:
                                <span class="badge bg-primary">{{ $codeCount }}</span>
                            </p>
                        </div>
                        <div class="col text-end">
                            <p style="font-size: 1.2em; margin: 0;">
                                <i class="fas fa-shopping-cart me-2"></i> Deals:
                                <span class="badge bg-success">{{ $dealCount }}</span>
                            </p>
                        </div>
                        <div class="col text-center">
                            <p style="font-size: 1.2em; margin: 0;">
                                <i class="fas fa-eye me-2"></i> Views:
                                <span class="badge bg-info">{{ $store->visits }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Store Information Sidebar Section -->
        <div class="col-md-4">
            <div class="store-info-card card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="text-center">
                    @if ($store->store_image)
                    <img src="{{ asset('uploads/store/' . $store->store_image) }}" class="logo img-fluid rounded-circle mb-3" alt="{{ $store->name }}">
                    @endif
                </div>
                <h4 class="card-title text-center">{{ $store->name }}</h4>
                <div class="text-center mb-3">
                    <span class="star-rating">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $store->rating)
                                <i class="fas fa-star"></i>
                            @else
                                <i class="far fa-star"></i>
                            @endif
                        @endfor
                    </span>
                </div>
                <p class="card-text text-center">{{ $store->description }}</p>
                <div class="text-center">
                    <a href="{{ $store->website_url }}" class="btn btn-info" target="_blank">Visit Website</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script>
function toggleCouponCode(couponId) {
    // Set the coupon ID in localStorage to remember the state
    localStorage.setItem('copiedCouponId', couponId);

    document.getElementById('coupon_id').value = couponId;
    document.getElementById('clickForm').submit();

    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const copyButton = document.getElementById(`copyBtn${couponId}`);

    if (codeElement.classList.contains('scratch')) {
        codeElement.classList.remove('scratch');
        copyButton.classList.remove('d-none');
    } else {
        codeElement.classList.add('scratch');
        copyButton.classList.add('d-none');
    }
}

// Check localStorage on page load to restore the state
document.addEventListener('DOMContentLoaded', function() {
    const copiedCouponId = localStorage.getItem('copiedCouponId');
    if (copiedCouponId) {
        const codeElement = document.getElementById(`codeIndex${copiedCouponId}`);
        const copyButton = document.getElementById(`copyBtn${copiedCouponId}`);

        if (codeElement.classList.contains('scratch')) {
            codeElement.classList.remove('scratch');
            copyButton.classList.remove('d-none');
        } else {
            codeElement.classList.add('scratch');
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
                const copyMessage = document.getElementById(`copyMessage${couponId}`);
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
