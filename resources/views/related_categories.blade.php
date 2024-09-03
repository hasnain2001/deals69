
<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

          <title>{{ $category->title }}</title>
    <!-- Your custom meta tags go here -->
     <meta name="description" content="{{ $category->meta_description }}">

 <meta name="keywords" content="{{$category->meta_keyword }}">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/category/{{ Str::slug($category->title) }}">

<link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/x-icon">

<style>
    .body{
background-color:#fff;
}
.container {
max-width: 1200px;
margin: auto;
padding: 20px;
}.text {
    font-family: 'Poppins', sans-serif;
    color: #2e3440;
    font-size: 36px;
    font-weight: 700;
    background: linear-gradient(90deg, #198ff0, #bfe9ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    padding: 20px;
    border-radius: 10px;
    letter-spacing: 1.5px;
}

.bg-light {
background-color: #f8f9fa;
}

.store-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    border-radius: 5%;
    color: black;
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}

.store-card img {
    width: 50%;
    height: auto;
    border-radius: 50%;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
   
    display: block;
    margin-left: auto;
    margin-right: auto;
}


.store-card:hover {
    color: black;
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.card-title {
    margin-top: 10px;
    font-size: 1rem; /* Reduced the font size to fit more items in a row */
    font-weight: bold;
}

.card-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

@media (min-width: 768px) {
    .card-list {
        justify-content: flex-start;
    }

    .card-list .col-6 {
        width: calc(16.66% - 10px); /* Adjusted width to fit more items */
        margin-right: 10px;
    }

    .card-list .col-6:nth-child(6n) {
        margin-right: 0;
    }
}
</style>
</head>
<body>
    <x-component-name/>
    <h1 class="text text-center">{{ $category->title }}</h1>
    <div class="container">
        @if ($stores->isEmpty())
            <div class="alert alert-info text-dark" role="alert">
                No stores found.
            </div>
        @else
            <div class="row card-list">
                @foreach ($stores as $store)
                    @php
                        $storeUrl = $store->slug
                            ? route('store_details', ['slug' => Str::slug($store->slug)])
                            : '#';
                    @endphp
                    <div class="col-6 col-md-3 col-lg-2 mb-4">
                        <a href="{{ $storeUrl }}" class="text-decoration-none store-card">
                            <img src="{{ $store->store_image ? asset('uploads/store/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}"
                                 alt="{{ $store->name ?: 'Store Image' }}" class="stores">
                            <h5 class="card-title">{{ $store->name ?: "Title not found" }}</h5>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <x-footer/>

        <script>
            function openCouponInNewTab(url, couponId) {
                window.open(url, '_blank');
                var modal = new bootstrap.Modal(document.getElementById('codeModal' + couponId));
                modal.show();
            }
        </script>
</body>
</html>
