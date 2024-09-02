
<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
          <title>Deals69 - Best Deals and Discounts |Categories</title>
    <!-- Your custom meta tags go here -->
     <meta name="description" content="Score incredible savings on top brands with Deals69! Electronics, fashion, home goods & more. Start saving today">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">
 <link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/categories">

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                <div class="col-12 col-lg-3 mb-3">

    <div class="card shadow p-3">
                            <div class="card-body">
                               <a href="{{ route('related_category',['title' => Str::slug($category->title)]) }}" class="text-decoration-none">
                             
                                    {{ $category->title }}
                                </a>


                                @if ($category->category_image)
                                <img class=" rounded-circle"
                                    src="{{ asset('uploads/categories/' . $category->category_image) }}"
                                    alt="{{ $category->title }} Image" style="width: 200px; height: 200px;">
                                @else
                                <p>No image available</p>
                                @endif
                                <h5 class="card-title mt-3 mx-2">{{ $category->title }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

<x-footer/>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

