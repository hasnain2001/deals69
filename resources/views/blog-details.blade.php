<?php
header("X-Robots-Tag:index, follow");?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@if(isset($blog) && is_object($blog))
   <!-- Your custom meta tags go here -->
   <title>{!! $blog->meta_title !!}</title>
    <link rel="canonical" href="https://deals69.com/blog/{{ Str::slug($blog->title) }}">
        <meta name="description" content="{!! $blog->meta_description !!}">

 <meta name="keywords" content="{!! $blog->meta_keyword !!}">
   <meta name="author" content="Najeeb-ullah khan">
 <meta name="robots" content="index, follow">
@else
    <!-- Handle the case where $store is not valid -->
    <!-- You can display a default canonical URL or handle it in another appropriate way -->
    <link rel="canonical" href="https://honeycombdeals.com">
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
<x-component-name/>
<br>
<div class="container">
  <div class="row">
    <!-- Blog Post Column -->
 <div class="col-md-8">
      <div class="blog-post card shadow rounded-lg border border-light mb-4">
 <img class="" src="{{ asset($blog->category_image) }}" alt="Blog Image" style="max-width:700px; height:400px;">
        <div class="card-body">
          <h1 class="card-title text-3xl font-semibold text-gray-800 mb-4">{{ $blog->title }}</h1>
          <p class="card-text text-gray-700 text-lg leading-relaxed">{!! $blog->content !!}</p>

        </div>
      </div>
    </div>

    <!-- Sidebar Column -->
    <div class="col-md-4">
      <aside class="sidebar p-3 bg-light">
        <!-- Sidebar Title -->
        <h2 class="bold text-dark mb-3">Top Stores</h2>
        <!-- Store Listings -->
        <div class="row gx-2 gy-2">
          @foreach ($chunks as $store)
            <div class="col-md-6 col-sm-4 col-6">
              <a href="{{ route('store_details', ['name' => Str::slug($store->name)]) }}" class="text-dark text-decoration-none d-flex flex-column p-2">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
