@extends('master')
@section('title')
    Home
@endsection
@section('main-content')

<style>
/* Coupon Card */
.coupon-card{height:100%;box-shadow:0 4px 8px rgba(0,0,0,.1);border-radius:8px;transition:transform .3s;display:flex;flex-direction:column;justify-content:space-between}.coupon-card:hover{transform:translateY(-5px)}.store-logo{display:flex;justify-content:center;align-items:center}.store-image{max-width:100px;height:auto;border-radius:10%;margin-bottom:15px}.coupon-title{font-size:1.2rem;font-weight:700;color:#333;margin-bottom:10px}.coupon-description{font-size:1rem;color:#666;flex-grow:1}.coupon-discount{font-size:.9rem;font-style:italic;color:#999;margin-bottom:15px}.coupon-buttons .btn{margin:0 5px;border-radius:10px;padding:10px 20px;transition:background-color .3s,color .3s}.get-deal-button,.visit-store-button:hover{background-color:#007bff;color:#fff}.get-deal-button:hover{background-color:#0056b3;color:#fff}.visit-store-button{background-color:#fff;color:#007bff;border:1px solid #007bff}
.slider-image {
    width: 100%; /* Always take the full width of the container */
    height: 450px; /* Maintain aspect ratio */
    
    object-fit: cover; /* Ensure the image covers the entire container without stretching */
}

/* Media queries for smaller screens */
@media (max-width: 768px) {
    .slider-image {
        height: 200px; /* Reduce height on tablets */
    }
}

@media (max-width: 576px) {
    .slider-image {
     height: 150px; /* Reduce height on mobile devices */
    }
}

.horizontal-scroll {
    display: flex;
    overflow-x: auto;
    padding-bottom: 10px;
    scrollbar-color: #1f1d1d #f1f1f1; /* Scroll bar colors */
    scrollbar-width: thin; /* Scroll bar width */
}

.horizontal-scroll::-webkit-scrollbar {
    height: 18px;
}

.horizontal-scroll::-webkit-scrollbar-thumb {
    background-color: #1b1313; /* Dark red thumb color */
    border-radius: 10px;
}

.horizontal-scroll::-webkit-scrollbar-track {
    background-color: #f1f1f1;
}

.card {
    flex: 0 0 auto; /* Prevents cards from shrinking */
}
.custom-heading {
    color: #f4fafc;
    font-weight: bold;
    font-size: 2.5em; /* Adjusted size for better visibility */
    text-align: center;  /* Center the text */
    text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4); /* Stronger shadow for more depth */
    background: linear-gradient(90deg, #0dcaf0, #0aa0d6);
    padding: 15px 20px; /* More padding for a nicer look */
    border-radius: 25px; /* Rounded corners */
    display: inline-block;
    margin: 0 auto; /* Center the heading container */
    letter-spacing: 1px; /* Slight letter spacing for readability */
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2); /* Subtle shadow around the heading */
}

.custom-heading:hover {
    background: linear-gradient(90deg, #0aa0d6, #0dcaf0);
    color: #ffffff;
    transition: all 0.3s ease-in-out;
    transform: scale(1.05);  /* Slight zoom effect on hover */
    box-shadow: 0 12px 18px rgba(0, 0, 0, 0.3); /* Enhanced shadow on hover */
}




</style>

<div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 rounded slider-image" src="{{ asset('images/slider.png') }}" alt="First slide" loading="lazy">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded  slider-image" src="{{ asset('images/caraosel.png') }}" alt="Second slide" loading="lazy">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 rounded  slider-image" src="{{ asset('images/caraosel-2.png') }}" alt="Third slide" loading="lazy">
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
                        <p class="fw-bold text-center">{{ $storeItem->name ?: 'Title not found' }}</p>
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
        <div class="col-md-4 shadow d-none d-md-block">
            <div class="container bg-info rounded text-white">
                <h4><em>Shopping Hacks & Savings Tips & Tricks</em></h4>
            </div>

            <div class="row">
                @foreach ($blogs as $blog)
                <div class="col-md-12 mb-4 d-block d-md-block">
                    <div class="card blog-card">
                        <div class="card-body">
                            <div class="blog-image">
                                <img class="img-fluid rounded shadow" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="max-width:700; height:auto; object-fit: cover;">
                            </div>
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            {{-- <p class="card-text">{{ $blog->excerpt }}</p> --}}
                            @if ($blog->slug)
                            <div class="d-grid gap-2">
                                <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark stretched-link">Read More</a>
                              </div>
                         
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
                                <span class="no-image-placeholder">{{ $coupon->store }} no slug</span>
                                @endif
                            </div>
                            {{-- <span>{{ $coupon->store }}</span> --}}
                            <h5 class="card-title coupon-title text-left">{{ $coupon->name }}</h5>
                            {{-- <p class="card-text coupon-description text-left">{{ $coupon->description }}</p> --}}
                            <span class="d-block mb-2 {{ \Carbon\Carbon::parse($coupon->ending_date)->isPast() ? 'text-danger' : 'text-muted' }}">
                                Ends: {{ \Carbon\Carbon::parse($coupon->ending_date)->format('d M, Y') }}
                            </span>
                            <div >
       <p class="card-text coupon-discount text-left text-muted">Used By: {{ $coupon->clicks }}</p>
                              
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                                 
                            @if ($coupon->code)
                            <a href="{{ $coupon->destination_url }}" target="_blank" class="get btn  btn-sm btn-primary btn-hover" id="getCode{{ $coupon->id }}" onclick="toggleCouponCode('{{ $coupon->id }}')">Coupon Code</a>
                            <div class="">
                                <span class="codeindex text-dark scratch" style="display: none;" id="codeIndex{{ $coupon->id }}">{{ $coupon->code }}</span>
                                <button class="btn btn-info text-white btn-sm copy-btn btn-hover d-none mt-2" id="copyBtn{{ $coupon->id }}" onclick="copyCouponCode('{{ $coupon->id }}')">Copy Code</button>
                                <p class="text-success copy-confirmation d-none mt-3" id="copyConfirmation{{ $coupon->id }}">Code copied!</p>
                            </div>
                            @else
                            <a href="{{ $coupon->destination_url }}" onclick="updateClickCount('{{ $coupon->id }}')" class="btn btn-primary get-deal-button" target="_blank">Get Deal</a>
                            @endif
                            @if ($store)
                            <a href="{{ route('store_details', ['slug' => Str::slug($coupon->store)]) }}" class="btn btn-sm  btn-dark">Visit Store</a>
                            @else
                            <a href="#" class="btn btn-sm ">No Store found </a>
                            @endif
                        </div>
                        <br>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</div>



    
           
     
 
      <div class="container ">
        <h4 class="custom-heading text-center ">Shopping Hacks & Savings Tips & Tricks</h4>
        <br>
        <div class="horizontal-scroll d-flex overflow-auto pb-3">
            @foreach ($home as $blog)
                <div class="card mx-2" >
                    <img class="card-img-top img-fluid" src="{{ asset($blog->category_image) }}" alt="Blog Post Image" style="height: 250px; object-fit: cover;">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                   
                       <br>
                        @if ($blog->slug)
                        <div class="d-grid gap-2">
                            <a href="{{ route('blog-details', ['slug' => Str::slug($blog->slug)]) }}" class="btn btn-dark">View Product</a>
                          </div>
                        
                        @else
                            <a href="javascript:;" class="btn btn-dark disabled">No Slug Available</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
    
      
    
      
      </div>


<br><br>
<script>
 // Function to toggle coupon code visibility and copy button
function toggleCouponCode(couponId) {
    // Set the coupon ID in localStorage to remember the state
    localStorage.setItem('copiedCouponId', couponId);

    const codeElement = document.getElementById(`codeIndex${couponId}`);
    const copyButton = document.getElementById(`copyBtn${couponId}`);

    if (codeElement.style.display === 'none') {
        codeElement.style.display = 'inline';
        copyButton.classList.remove('d-none');
    } else {
        codeElement.style.display = 'none';
        copyButton.classList.add('d-none');
    }

    // Update the click count via AJAX
    updateClickCount(couponId);
}

// Check localStorage on page load to restore the state
document.addEventListener('DOMContentLoaded', function() {
    const copiedCouponId = localStorage.getItem('copiedCouponId');
    if (copiedCouponId) {
        const codeElement = document.getElementById(`codeIndex${copiedCouponId}`);
        const copyButton = document.getElementById(`copyBtn${copiedCouponId}`);

        codeElement.style.display = 'inline';
        copyButton.classList.remove('d-none');
    }
});

// Clear localStorage on refresh
window.addEventListener('beforeunload', function () {
    localStorage.removeItem('copiedCouponId');
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

// Function to update click count via AJAX
function updateClickCount(couponId) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '{{ route("update.clicks") }}', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Click count updated successfully.');
        }
    };

    xhr.send('coupon_id=' + couponId);
}

// Function to count clicks (fallback if not using AJAX)
function countClicks(couponId) {
    document.getElementById('coupon_id').value = couponId;
    document.getElementById('clickForm').submit();
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
