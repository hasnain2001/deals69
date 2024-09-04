<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deals69 - Best Deals and Discounts | Blog</title>
  <meta name="description" content="Discover unbeatable deals, discounts, and coupons at Deals69. Save money on your favorite products from top brands. Start saving today!">
  <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
  <meta name="author" content="John Doe">
  <meta name="robots" content="index, follow">
  <link rel="canonical" href="https://deals69.com/blog">
  <link rel="shortcut icon" href="{{asset('images/icon.png')}}" type="image/x-icon">

  <style>
.blog-post .post-content,.container{padding:20px}.blog-post,.sidebar{box-shadow:0 0 10px rgba(0,0,0,.1)}body{font-family:Arial,sans-serif;background-color:#f8f9fa}.container{max-width:1200px;margin:0 auto}.row{display:flex;flex-wrap:wrap}.col-md-4,.col-md-8{padding:15px}.col-md-8{flex:0 0 66.666%;max-width:66.666%}.col-md-4{flex:0 0 33.333%;max-width:33.333%}.blog-post{background-color:#fff;margin-bottom:30px;border-radius:5px;transition:transform .3s}.blog-post:hover{transform:translateY(-5px)}.blog-post img{max-width:100%;height:auto;border-top-left-radius:5px;border-top-right-radius:5px}.blog-post .post-content h2{color:#333;margin-bottom:10px}.blog-post .post-content p{color:#666;margin-bottom:20px}.btn-read-more{background-color:#343a40;color:#fff;border:none;padding:8px 20px;border-radius:20px;text-transform:uppercase;font-weight:700;transition:background-color .3s}.btn-read-more:hover{background-color:#23272b}.sidebar{background-color:#fff;color:#343a40;padding:20px;border-radius:5px}.sidebar h2{color:#343a40;margin-bottom:20px}.sidebar .store-listing{display:flex;flex-direction:column;align-items:center;text-align:center}.sidebar .store-listing img{border-radius:50%;width:100px;height:100px;object-fit:cover;margin-bottom:10px}.sidebar .store-listing p{margin:0;color:#333}
  </style>
</head>
<body>
    <nav>
        @include('components.component-name')
    </nav>
  <div class="container">
    <div class="row">
      <!-- Blog Posts Column -->
      <div class="col-md-8">
        <div class="row">
          @foreach ($blogs as $blog)
            <div class="col-md-12">
              <div class="blog-post">

                @php
                $storeUrl = $blog->slug
                    ? route('blog-details', ['slug' => Str::slug($blog->slug)])
                    : '#';
            @endphp
                <a href="{{ $storeUrl }}" >
                <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image">
                <div class="post-content">
                  <h2>{{ $blog->title }}</h2>
                  <p>{{ $blog->meta_description }}</p>
                </a>
                  <a href="{{ $storeUrl }}" class="btn btn-dark">Read More</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
          {{ $blogs->links('vendor.pagination.bootstrap-5') }}
        </div>
      </div>


    <!-- Sidebar Column -->
    <div class="col-md-4">
        <aside class="sidebar p-3 bg-light">
          <!-- Sidebar Title -->
          <h2 class="bold text-dark mb-3">Latest Stores</h2>
          <!-- Store Listings -->
          <div class="row gx-2 gy-2">
            @foreach ($chunks as $store)

            @php
            $storeUrl = $store->slug
                ? route('store_details', ['slug' => Str::slug($store->slug)])
                : '#';
        @endphp
              <div class="col-md-6 col-sm-4 col-6">
                <a href="{{ $storeUrl }}" class="text-decoration-none store-card text-dark">
                  <!-- Store Image -->
                  <img src="{{ asset('uploads/store/' . $store->store_image) }}" alt="{{ $store->name }}" class="mb-2 rounded-circle shadow" style="width: 100px; height: 100px; object-fit: cover;">
                  <!-- Store Name -->
                  <p class="text-capitalize">{{ $store->name }}</p>
                </a>
              </div>
            @endforeach
          </div>
        </aside>
      </div>

    </div>
  </div>

  <x-footer/>
</body>
</html>
