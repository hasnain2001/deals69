<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Your custom meta tags go here -->
     <title>Deals69 - Best Deals and Discounts |Blog</title>
<meta name="description" content="Discover unbeatable deals, discounts, and coupons at Deals69. Save money on your favorite products from top brands. Start saving today!">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/blog">
   <link rel="icon" href="{{ asset('front/assets/images/icons.png') }}" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->

  
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
 
    .blog-post {
      background-color: #fff;
      margin-bottom: 30px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .blog-post:hover {
      transform: translateY(-5px);
    }
    .blog-post img {
      max-width: 100%;
      height: auto;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }
    .blog-post .post-content {
      padding: 20px;
    }
    .blog-post .post-content h2 {
      color: #333;
      margin-bottom: 10px;
    }
    .blog-post .post-content p {
      color: #666;
      margin-bottom: 20px;
    }
    .btn-read-more {
      background-color: #343a40;
      color: #fff;
      border: none;
      padding: 8px 20px;
      border-radius: 20px;
      text-transform: uppercase;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .btn-read-more:hover {
      background-color: #23272b;
    }
    .sidebar {
      background-color: #343a40;
      color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .sidebar h3 {
      color: #fff;
      margin-bottom: 20px;
    }
    .sidebar ul {
      list-style-type: none;
      padding: 0;
    }
    .sidebar li {
      margin-bottom: 10px;
    }
    .sidebar a {
      color: #fff;
      text-decoration: none;
    }
    .sidebar a:hover {
      color: #ccc;
    }
    .img{
        width: 250px;
        height: 200;
        border-radius:5%;
    }



}
  
    .form-container {
      max-width: 600px; /* Adjust max-width as needed */
      width: 100%;
    }
    .form-container form {
        right:200px;
      display: flex;
      justify-content: center; /* Center contents horizontally */
      align-items: center;
    }
    .social-icons a {
      color:white; /* Change icon color as needed */
      margin-left: 10px; /* Adjust margin between icons as needed */
      font-size: 25px; /* Adjust icon size as needed */
    }
    .form-container form {
            display: flex;
            justify-content: center; /* Center contents horizontally */
            align-items: center;
        }
        .social-icons a {
            color: white; /* Change icon color as needed */
            margin-left: 10px; /* Adjust margin between icons as needed */
            font-size: 25px; /* Adjust icon size as needed */
        }
        section {
            background-color: rgb(87, 18, 124);
        }
        .bold{
            color:black;
        }
  </style>
</head>
<body>

<x-component-name/>


<br><br>


 <div class="container">

  <div class="row">
        <div class="col-md-8">
  <!-- Blog posts --> 
<div class="col-md-8">
    <div class="row">
    @foreach ($blogs as $blog)
    @if ($blog->title)
 <a href="{{ route('blog-details', ['title' => Str::slug($blog->title)]) }}" >

                            @else
                                <a href="javascript:;" class="text-decoration-none">
                            @endif
        <div class="col-md-12">
            <div class="blog-post">
                <img src="{{ asset($blog->category_image) }}" alt="Blog Post Image">
                <div class="post-content">
                    <h2>{{ $blog->title }}</h2>
                    <p>{{ $blog->meta_description }}</p>
                    <!-- Add more fields as needed -->
           </a> <a href="{{ route('blog-details', ['title' => Str::slug($blog->title)]) }}" class="btn btn-dark">Read More </a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
    </div>



<div class="col-md-4">
  <aside class="sidebar p-3 bg-light">  <h2 class="bold">Top Stores</h2>
    <div class="row gx-2 gy-2">  @foreach ($chunks as $store)
      <div class="col-md-3 col-sm-4 col-6">  <a href="{{ route('store_details', ['name' => Str::slug($store->name)]) }}" class="text-dark text-decoration-none d-flex flex-column p-2">
          <img src="{{ asset('uploads/store/' . $store->store_image) }}" alt="{{ $store->name }}" class="mb-2 rounded-circle shadow" style="width: 100px; height: 100px; object-fit: cover;">
          <p  class="text-capitalize" >{{ $store->name }}</p>
        </a>
      </div>
      @endforeach
    </div>
  </aside>
</div>

  </div>
</div>

  </div>
</div>

  </div>
 

  <x-footer/>
  
  
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
