@extends('master')
@section('title')
    Home
@endsection
@section('main-content')



<style>
    .btn-outline-info:hover {
        color: #fff;
        background-color: #17a2b8;
        border-color: #17a2b8;
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
    }

    .coupouns {
        max-width: 800px;
        margin: auto;
        padding: 20px;
    }

    .coupon-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        height: 200px; /* Set the desired height here */
    }

    .coupon-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .coupon-header {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        font-size: 1.2rem; /* Adjust the font size */
    }

    .coupon-header h3 {
        margin: 0;
    }

    .coupon-body {
        padding: 10px 20px; /* Adjust the padding */
        font-size: 1rem; /* Adjust the font size */
    }

    .coupon-body h5 {
        margin-top: 0;
    }

    .coupon-footer {
        padding: 10px 20px;
        text-align: right;
        background-color: #f8f9fa;
    }

    .coupon-footer a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.3s;
    }

    .coupon-footer a:hover {
        color: #0056b3;
    }

/* Reset styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Custom styles */
body {

  align-items: center;
  justify-content: center;
  min-height: 100vh;
  background: #f1f4fd;
}

.container {
  max-width: 1200px;
  width: 95%;
}

.slider-wrapper {
  position: relative;
}

.slider-wrapper .slide-button {
  position: absolute;
  top: 50%;
  outline: none;
  border: none;
  height: 50px;
  width: 50px;
  z-index: 5;
  color: #fff;
  display: flex;
  cursor: pointer;
  font-size: 2.2rem;
  background: #000;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transform: translateY(-50%);
}

.slider-wrapper .slide-button:hover {
  background: #404040;
}

.slider-wrapper .slide-button#prev-slide {
  left: -25px;
}

.slider-wrapper .slide-button#next-slide {
  right: -25px;
}

.slider-wrapper .image-list {
  display: flex;
  gap: 18px;
  font-size: 0;
  list-style: none;
  margin-bottom: 30px;
  overflow-x: auto;
  scrollbar-width: none;
}

.slider-wrapper .image-list::-webkit-scrollbar {
  display: none;
}

.slider-wrapper .image-list .image-item {
  width: 220px;
  height: 200px;
  object-fit: cover;
  border-radius:50%;
}

.container .slider-scrollbar {
  height: 24px;
  width: 100%;
  display: flex;
  align-items: center;
}

.slider-scrollbar .scrollbar-track {
  background: #ccc;
  width: 100%;
  height: 2px;
  display: flex;
  align-items: center;
  border-radius: 4px;
  position: relative;
}

.slider-scrollbar:hover .scrollbar-track {
  height: 4px;
}

.slider-scrollbar .scrollbar-thumb {
  position: absolute;
  background: #000;
  top: 0;
  bottom: 0;
  width: 50%;
  height: 100%;
  cursor: grab;
  border-radius: inherit;
}

.slider-scrollbar .scrollbar-thumb:active {
  cursor: grabbing;
  height: 8px;
  top: -2px;
}

.slider-scrollbar .scrollbar-thumb::after {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  top: -10px;
  bottom: -10px;
}

/* Styles for mobile and tablets */
@media only screen and (max-width: 1023px) {
  .slider-wrapper .slide-button {
    display: none !important;
  }

  .slider-wrapper .image-list {
    gap: 10px;
    margin-bottom: 15px;
    scroll-snap-type: x mandatory;
 
  }}
</style>



<div class="container">
    <h2 class="fw-bold home_ts_h2">Latest Discount Codes & Promo Codes From Popular Stores</h2>
    <div class="slider-wrapper">
        <button id="prev-slide" class="slide-button material-symbols-rounded"></button>
        <ul class="image-list">
            @foreach ($stores as $storeItem)
                <li>
                    <a href="{{ route('store_details', ['name' => Str::slug($storeItem->name)]) }}" class="text-dark text-decoration-none">
                        <img class="image-item" src="{{ asset('uploads/store/' . $storeItem->store_image) }}" alt="{{ $storeItem->name }}"/>
                        <span class="fw-bold d-block text-center">{{ $storeItem->name }}</span>
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
    @foreach ($Coupons as $coupon)
    <div class="col-md-4 mb-3">
      <div class="card mb-3 coupon-card bg-white rounded shadow-sm">
          <div class="row g-0">
            <div class="col-4 col-md-4 col-lg-4">
              @php
              $store = App\Models\Stores::where('name', $coupon->store)->first();
              @endphp
              <div class="d-flex justify-content-center align-items-center">
                  @if ($store && $store->store_image)
                  <img src="{{ asset('uploads/store/' . $store->store_image) }}" class=" rounded-circle shadow" alt="{{ $store->name }} Logo" style="max-width: 100%; height: auto;">
                  @else
                  <span class="no-image-placeholder">No Logo Available</span>
                  @endif
              </div>
          </div>
          
              <div class="col-8 col-md-12 col-lg-8">
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
      @if (($loop->index + 1) % 3 == 0)
        <div class="w-100"></div>
      @endif
    @endforeach
  </div>
</div>





    <!-- <div class="row mt-5">
        <h2 class="fw-bold home_ts_h2">Top Categories</h2>
        @foreach ($categories as $category)
            <div class="col-12 col-lg-2 col-md-4 col-sm-12 ">
           <a href="{{ url('related_category/'. Str::slug($category->meta_tag)) }}" class="text-decoration-none">


                  <div class="stores home_top_stores shadow p-3">
                     @if ($category->category_image)
                        <img  src="{{ asset('uploads/' . $category->category_image) }}" alt="{{ $category->title }} Image"  width="100%" height="150">
                    @else
                        <p>No image available</p>
                    @endif
                      <span class="fw-bold">{{ $category->title }}</span>
                  </div>
                </a>
            </div>
        @endforeach
    </div> -->


<br><br><br>

<h2 class="fw-bold home_ts_h2">Shopping Hacks & Savings Tips & Tricks</h2>

 

 <div class="container">
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <img class="img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Post Image">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->excerpt }}</p>
                    <a href="{{ route('blog-details', ['title' => Str::slug($blog->title)]) }}" class="btn btn-dark">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
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