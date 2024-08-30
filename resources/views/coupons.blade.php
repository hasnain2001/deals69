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
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
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
</head>
<body>
<x-component-name/>
<br>

<button id="scrollUpBtn" title="Go to top">↑</button>
<div class="container bg-light">
    <div class="row mt-3 justify-content-center"> <!-- Center the pagination links -->
        <div class="col-12 bg-light text-center"> <!-- Add text-center class here -->
            {{ $coupons->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
<div class="container"><p class="h5 m-0">Total coupons: <span class="fw-bold">{{ $coupons->total() }}</span></p></div></div>


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






<x-footer/>
<script>
    // When the user clicks on the button, scroll to the top of the document
scrollUpBtn.onclick = function() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
    function copyCoupon(code) {
        navigator.clipboard.writeText(code)
            .then(() => {

            })
            .catch((error) => {
                console.error("Failed to copy: ", error);
            });
    }

        function openCouponInNewTab(url, couponId) {
            window.open(url, '_blank');
            var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
            modal.show();
        }
    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
