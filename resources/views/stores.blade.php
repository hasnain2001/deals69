<?php
header("X-Robots-Tag:index, follow");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Deals69 - Best Deals and Discounts |Stores</title>
     <meta name="description" content="Score incredible savings on top brands with Deals69! Electronics, fashion, home goods & more. Start saving today!">
 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">

<link rel="canonical" href="https://deals69.com/stores">
<link rel="icon" href="{{ asset('images/dlogo-removebg-preview.png') }}" type="image/x-icon">
    <!-- Styles -->

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
           <style>

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
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
    width: 100%;
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

        .pagination-responsive {
    flex-wrap: wrap;
  }
  .page-item {
    margin: 0.2rem;
  }
  .page-link {
    border-radius: 0.375rem;
  }
  .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
  }
  .page-link {
    color: #0d6efd;
  }
  .page-link:hover {
    background-color: #e9ecef;
    color: #0d6efd;
  }
    </style>
</head>
<body class="">
<x-component-name/>

<div class="scrollbar" id="style-6">
    <div class="force-overflow">

        <div class="container bg-light">
            <div class="row mt-3 justify-content-center">
              <div class="col-12">
                <ul class="pagination pagination-responsive justify-content-center">
                  @foreach(range('A', 'Z') as $letter)
                    <li class="page-item {{ request()->get('letter') == $letter ? 'active' : '' }}">
                      <a class="page-link" href="{{ route('stores', ['letter' => $letter]) }}">{{ $letter }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

<div class="container">
    <p class="h5 m-0">Total stores: <span class="fw-bold">{{ $stores->total() }}</span></p>
</div>
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

</body>
</html>
