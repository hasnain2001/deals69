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
     <meta name="description" content="Score incredible savings on top brands with Deals69! Electronics, fashion, home goods & more. Start saving today">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">
         <link rel="canonical" href="https://deals69.com/coupons">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

     <link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
<style>
.get-deal-button,.get-deal-button:hover{background-color:#17a2b8;border-color:#17a2b8;color:#fff;padding:10px 20px;border-radius:5px;text-decoration:none;transition:background-color .3s,border-color .3s}.get-deal-button:hover{background-color:#138496;border-color:#117a8b;box-shadow:0 0 10px rgba(0,0,0,.2)}.coupon-card{display:flex;flex-direction:column;height:100%}.coupon-card .card-body{flex:1}.coupon-card img{height:100px;object-fit:cover}.coupon-card .btn-group{margin-top:auto}.modal-body{text-align:center}.card{color:gray;padding:10px;margin-top:10px}
  </style>
</head>
<body>
<x-component-name/>
<br>


<div class="container">

{{$coupons->links('pagination::bootstrap-5')  }}
    <div class="row">
      @foreach ($coupons as $coupon)
        <div class="col-md-4 mb-3">
          <div class="card mb-3 coupon-card bg-white rounded shadow-sm">
            <div class="row g-0">
              <div class="col-md-4 shadow">
                @php
                  $store = App\Models\Stores::where('slug', $coupon->store)->first();
                @endphp
                @if ($store && $store->store_image)
                  <img src="{{ asset('uploads/store/' . $store->store_image) }}" class="img-fluid rounded-start" alt="{{ $store->name }} Logo">
                @else
                  <span class="no-image-placeholder">No Logo Available</span>
                @endif
              </div>
              <div class="col-md-8">
                <div class="card-body">

                  <span class="card-title coupon-title text-info">{{ $coupon->store }}</span>
                  <div class="card">
                    <span class="text ">{{ $coupon->name }}</span>
                  </div>



                  <p class="coupon-description">{{ $coupon->description }}</p>
                  @php
                  // Get the current time in Karachi timezone
                  $now = \Carbon\Carbon::now('Asia/Karachi');
                  // Convert coupon's created_at to Karachi timezone
                  $created_at = \Carbon\Carbon::parse($coupon->ending_date)->timezone('Asia/Karachi');
              @endphp

<p style="color: {{ $created_at->isPast() ? 'red' : 'inherit' }};">
    {{ $created_at->format('d M, Y') }}
</p>
                  <div class="d-flex justify-content-between align-items-center">

                    <div class="btn-group" role="group" aria-label="Coupon Buttons">
                      @if ($coupon->code)
                        <a href="#" class="btn btn-sm btn-primary get-deal-button" id="getCode{{ $coupon->id }}" onclick="openCouponInNewTab('{{ $coupon->destination_url }}', '{{ $coupon->id }}')">Code & Activate</a>
                      @else
                        <a href="{{ $coupon->destination_url }}" class="btn btn-sm btn-primary get-deal-button" target="_blank">Get Deal</a>
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
          </div>
        </div>

        @if (($loop->index + 1) % 3 == 0)
          <div class="w-100"></div>
        @endif

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





<x-footer/>
<script>
    function copyCoupon(code) {
        navigator.clipboard.writeText(code)
            .then(() => {

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

</body>
</html>
