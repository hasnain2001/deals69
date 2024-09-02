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

    .card-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
    }

    .card-list a {
        text-decoration: none;
        color: inherit;
        width: 100%;
        max-width: 200px;
        margin-bottom: 20px;
        padding: 10px;
        border-radius: 5px;

        transition: all 0.3s ease;
    }

    .card-list a:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .stores {
        width: 100%;
      height: auto;
  border-radius: 60%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
    }
.stores:hover {
  transform: scale(1.05);
}
    .card-title {
        text-align: center;
        margin-top: 10px;
        font-size: 1.2rem;
        font-weight: bold;
    }

    @media (min-width: 768px) {
        .card-list {
            justify-content: flex-start;
        }

        .card-list a {
            width: calc(25% - 20px);
            margin-right: 20px;
            margin-bottom: 20px;
        }

        .card-list a:nth-child(4n) {
            margin-right: 0;
        }
    }

    .pagination-responsive {
    flex-wrap: wrap;
}

.pagination-responsive .page-item {
    margin: 2px; /* Add margin for better spacing */
}

.pagination-responsive .page-link {
    padding: 8px 12px; /* Adjust padding for better touch target size */
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
                    <li class="page-item"><a class="page-link" href="{{ route('stores', ['letter' => $letter]) }}">{{ $letter }}</a></li>
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
        <div class="card-list">
            @foreach ($stores as $store)
                <a href="{{ route('store_details', ['name' => Str::slug($store->name)]) }}" class="text-decoration-none">
                    <img class="stores shadow" src="{{ $store->store_image ? asset('uploads/store/' . $store->store_image) : asset('front/assets/images/no-image-found.jpg') }}" alt="Card Image">
                    <h5 class="card-title mt-3 mx-2">{{ $store->name ?: "Title not found" }}</h5>
                </a>
            @endforeach
        </div>
    @endif
</div>
</div>
</div>



<x-footer/>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
