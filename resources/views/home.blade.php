@extends('master')
@section('title')
    Home
@endsection
@section('main-content')

<style>
/* Coupon Card */
.coupon-card{height:100%;box-shadow:0 4px 8px rgba(0,0,0,.1);border-radius:8px;transition:transform .3s;display:flex;flex-direction:column;justify-content:space-between}.coupon-card:hover{transform:translateY(-5px)}.store-logo{display:flex;justify-content:center;align-items:center}.store-image{max-width:100px;height:auto;border-radius:50%;margin-bottom:15px}.coupon-title{font-size:1.2rem;font-weight:700;color:#333;margin-bottom:10px}.coupon-description{font-size:1rem;color:#666;flex-grow:1}.coupon-discount{font-size:.9rem;font-style:italic;color:#999;margin-bottom:15px}.coupon-buttons .btn{margin:0 5px;border-radius:10px;padding:10px 20px;transition:background-color .3s,color .3s}.get-deal-button,.visit-store-button:hover{background-color:#007bff;color:#fff}.get-deal-button:hover{background-color:#0056b3;color:#fff}.visit-store-button{background-color:#fff;color:#007bff;border:1px solid #007bff}

</style>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 rounded" src="{{ asset('images/caraosel-1.png') }}" alt="First slide" loading="lazy">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded" src="{{ asset('images/caraosel.png') }}" alt="Second slide" loading="lazy">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded" src="{{ asset('images/caraosel-2.png') }}" alt="Third slide" loading="lazy">
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



<div class="container">
    <h2 class="fw-bold home_ts_h2">Latest Discount Codes & Promo Codes From Popular Stores</h2>
    <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded"></button>
        <ul class="image-list">
            @foreach ($stores as $storeItem)
                @php
                    $storeUrl = $storeItem->slug
                        ? route('store_details', ['slug' => Str::slug($storeItem->slug)])
                        : '#';
                @endphp
                <li>
                    <a href="{{ $storeUrl }}" class="text-decoration-none">
                        <img class="image-item" src="{{ $storeItem->store_image ? asset('uploads/store/' . $storeItem->store_image) : asset('front/assets/images/no-image-found.jpg') }}" alt="{{ $storeItem->name }}"/>
                        <span class="fw-bold d-block text-center">{{ $storeItem->name ?: 'Title not found' }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        <button id="next-slide" class="slide-button material-symbols-rounded"></button>
    </div>
    <div class="slider-scrollbar">
        <div class="scrollbar-track">
            <div class="scrollbar-thumb"></div>
        </div>
    </div>
</div>






<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4 shadow">
            <div class="container bg-info rounded text-white">
            <h4><em>Shopping Hacks & Savings Tips & Tricks</em></h4></div>

            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-12 mb-4">
                    <div class="card blog-card">
                        <div class="card-body">
                            <div class="blog-image">

                                <img class="img-fluid rounded shadow" src="{{ asset($blog->category_image) }}" alt="Blog Post Image "  style="max-width:700; height:auto; object-fit: cover;" >
                            </div>
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ $blog->excerpt }}</p>
                            @if ($blog->slug)
                            <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark stretched-link">Read More</a>
                             @else
                            <a href="javascript:;" class="btn btn-dark stretched-link"> no slug/url</a>
                                 @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
        <div class="col-md-8">
            <div class="container">
                <h3>Top Coupons</h3>
            </div>

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
            </div>
        </div>


    </div>
</div>



      <div class="col-12" >
        <h2 class="fw-bold home_ts_h2 text-center"> Shopping Hacks & Savings Tips & Tricks</h2>
      </div>
      <div class="container bg-light">

          <div class="carousel-inner bg-light">
            @foreach ($home->chunk(2000) as $chunk)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="d-flex flex-row flex-nowrap overflow-auto">
                  @foreach ($chunk as $blog)
                    <div class="col-md-4 mb-3 flex-shrink-0">
                      <div class="card shadow-sm h-100">
                        <img class="cardimg card-img-top img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="height:200px; width:450px;">
                        <div class="card-body">
                          <h5 class="card-title">{{ $blog->title }}</h5>
                          <p class="card-text">{{ $blog->excerpt }}</p>
                                @if ($blog->slug)
                          <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark stretched-link">Read More</a>
                           @else
                          <a href="javascript:;" class="btn btn-dark stretched-link"> no slug</a>
                               @endif
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endforeach
          </div>

        </div>
      </div>


<br><br>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const storeCarousel = document.getElementById('storeCarousel');
        const carousel = new bootstrap.Carousel(storeCarousel, {
            interval: 2000, // Set the interval between slides
            wrap: true       // Enable wrapping for infinite sliding
        });
    });
</script>
<script>
    const initSlider = () => {
    const imageList = document.querySelector(".slider-wrapper .image-list");
    const slideButtons = document.querySelectorAll(".slider-wrapper .slide-button");
    const sliderScrollbar = document.querySelector(".container .slider-scrollbar");
    const scrollbarThumb = sliderScrollbar.querySelector(".scrollbar-thumb");
    const maxScrollLeft = imageList.scrollWidth - imageList.clientWidth;

    // Handle scrollbar thumb drag
    scrollbarThumb.addEventListener("mousedown", (e) => {
        const startX = e.clientX;
        const thumbPosition = scrollbarThumb.offsetLeft;
        const maxThumbPosition = sliderScrollbar.getBoundingClientRect().width - scrollbarThumb.offsetWidth;

        // Update thumb position on mouse move
        const handleMouseMove = (e) => {
            const deltaX = e.clientX - startX;
            const newThumbPosition = thumbPosition + deltaX;

            // Ensure the scrollbar thumb stays within bounds
            const boundedPosition = Math.max(0, Math.min(maxThumbPosition, newThumbPosition));
            const scrollPosition = (boundedPosition / maxThumbPosition) * maxScrollLeft;

            scrollbarThumb.style.left = `${boundedPosition}px`;
            imageList.scrollLeft = scrollPosition;
        }

        // Remove event listeners on mouse up
        const handleMouseUp = () => {
            document.removeEventListener("mousemove", handleMouseMove);
            document.removeEventListener("mouseup", handleMouseUp);
        }

        // Add event listeners for drag interaction
        document.addEventListener("mousemove", handleMouseMove);
        document.addEventListener("mouseup", handleMouseUp);
    });

    // Slide images according to the slide button clicks
    slideButtons.forEach(button => {
        button.addEventListener("click", () => {
            const direction = button.id === "prev-slide" ? -1 : 1;
            const scrollAmount = imageList.clientWidth * direction;
            imageList.scrollBy({ left: scrollAmount, behavior: "smooth" });
        });
    });

     // Show or hide slide buttons based on scroll position
    const handleSlideButtons = () => {
        slideButtons[0].style.display = imageList.scrollLeft <= 0 ? "none" : "flex";
        slideButtons[1].style.display = imageList.scrollLeft >= maxScrollLeft ? "none" : "flex";
    }

    // Update scrollbar thumb position based on image scroll
    const updateScrollThumbPosition = () => {
        const scrollPosition = imageList.scrollLeft;
        const thumbPosition = (scrollPosition / maxScrollLeft) * (sliderScrollbar.clientWidth - scrollbarThumb.offsetWidth);
        scrollbarThumb.style.left = `${thumbPosition}px`;
    }

    // Call these two functions when image list scrolls
    imageList.addEventListener("scroll", () => {
        updateScrollThumbPosition();
        handleSlideButtons();
    });
}

window.addEventListener("resize", initSlider);
window.addEventListener("load", initSlider);
</script>

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
  <script src="{{ asset('front/assets/js/java.js') }}"></script>
@endsection
