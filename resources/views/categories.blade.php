<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deals69 - Best Deals and Discounts | Categories</title>
    <!-- Your custom meta tags go here -->
    <meta name="description" content="Score incredible savings on top brands with Deals69! Electronics, fashion, home goods & more. Start saving today">
    <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
    <link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
    <meta name="author" content="John Doe">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://deals69.com/categories">

    <style>
        /* Style for the card container */
        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        /* Style for the card image */
        .card img {
            border-radius: 50%; /* Makes the image round */
            width: 150px; /* Set the width of the image */
            height: 150px; /* Set the height of the image */
            object-fit: cover; /* Maintain aspect ratio and cover the entire area */
        }

        /* Style for the card title */
        .card-title {
            text-align: center;
            margin-top: 10px;
        }

    </style>
  </head>
  <body>

   <x-component-name/>

   <main>
    <div class="main_content">
        <div class="container">
            <div class="row mt-3">
                <h1>Categories</h1>
                @foreach ($categories as $category)
                <div class="col-6 col-md-6 col-lg-2 mb-4">
                    <div class="card shadow p-3 h-100 text-center">
                        <div class="card-body d-flex flex-column align-items-center">
                            <a href="{{ route('related_category',['title' => Str::slug($category->title)]) }}" class="text-decoration-none">
                                @if ($category->category_image)
                                <img class="rounded-circle"
                                    src="{{ asset('uploads/categories/' . $category->category_image) }}"
                                    alt="{{ $category->title }} Image" style="width: 150px; height: 150px; object-fit: cover;">
                                @else
                                <p>No image available</p>
                                @endif
                                <h5 class="card-title text-left mt-3">{{ $category->title }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

    <x-footer/>

  </body>
</html>
