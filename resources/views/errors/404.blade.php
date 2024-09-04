<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            font-size: 100px;
            margin: 0;
            color: #e74c3c;
        }
        h2 {
            font-size: 24px;
            margin: 20px 0;
            color: #555;
        }
        p {
            font-size: 18px;
            color: #666;
        }


        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 18px;
            color: #fff;
            background-color: #222425;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;

        }
        .button:hover {
            background-color: #030303;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <nav>
        @include('components.component-name')
    </nav>
    <br><br>
    <div class="container">
        <h1>404</h1>
        <h2>Oops! Page Not Found</h2>
        <p>It looks like the page you were trying to reach does not exist.</p>
        <a href="{{ url('/') }}" class="button ">Go Back to Home</a>

    <div class="row">
        @foreach ($Coupons as $coupon)
        <div class="col-md-4 mb-3">
            <div class="card coupon-card h-100">
                <div class="card-body d-flex flex-column">
                    <div class="store-logo text-center mb-3">
                        @php
                        $store = App\Models\Stores::where('slug', $coupon->store)->first();
                        @endphp
                        @if ($store && $store->store_image)
                        <img src="{{ asset('uploads/store/' . $store->store_image) }}" class="store-image" alt="{{ $store->name }} Logo">
                        @else
                        <span class="no-image-placeholder">Store  iS not Available </span>
                        @endif
                    </div>
                    <span>{{ $coupon->store }}</span>
                    <h5 class="card-title coupon-title text-left">{{ $coupon->name }}</h5>
                    <p class="card-text coupon-description text-left">{{ $coupon->description }}</p>

                    <div class="mt-auto">
                        <p class="card-text coupon-discount text-left text-muted">Discount: {{ $coupon->discount }}</p>
                        <div class="coupon-buttons d-flex justify-content-start">
                            @if ($coupon->code)
                            <a href="#" class="btn btn-primary get-deal-button" onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">Code & Activate</a>
                            @else
                            <a href="{{ $coupon->destination_url }}" class="btn btn-primary get-deal-button" target="_blank">Get Deal</a>
                            @endif
                            @if ($store)
                            <a href="{{ route('store_details', ['slug' => Str::slug($coupon->store)]) }}" class="btn btn-outline-primary btn-sm visit-store-button ml-2">Visit Store</a>
                            @else
                            <a href="#" class="btn btn-sm btn-outline-primary visit-store-button ml-2">No Store found </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>  </div>
    <br><br>
    <footer>
        @include('components.footer')
    </footer>
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

        function openCouponInNewTab(url, couponId) {
            window.open(url, '_blank');
            var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
            modal.show();

            // Automatically close the modal after 5 seconds when hovered over
            setTimeout(function() {
                modal.hide();
            }, 5000); // 5000 milliseconds = 5 seconds
        }
    </script>
</body>
</html>
