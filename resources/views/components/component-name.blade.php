<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
<style>
    body{
        margin: 0;
        padding: 0;
    }
    /* width */
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey;
  border-radius: 10px;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #0dcaf0;
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background:#126c7e;
}

.loader {
  width: 120px;
  height: 20px;
  background: linear-gradient(#000 0 0) 0/0% no-repeat #ddd;
  animation: l1 2s infinite linear;
  position: fixed; /* Position it in the center */
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 9999; /* Ensure it appears above everything else */
}

@keyframes l1 {
    100% { background-size: 100%; }
}
#myBtn {
  display: none; /* Hidden by default */
  position: fixed; /* Fixed/sticky position */
  bottom: 20px; /* Place the button at the bottom of the page */
  right: 30px; /* Place the button 30px from the right */
  z-index: 99; /* Make sure it does not overlap */
  border: none; /* Remove borders */
  outline: none; /* Remove outline */
  background-color: #0dcaf0; /* Set a background color */
  color: white; /* Text color */
  cursor: pointer; /* Add a mouse pointer on hover */
  padding: 15px; /* Some padding */
  border-radius: 10px; /* Rounded corners */
  font-size: 18px; /* Increase font size */
}

#myBtn:hover {
  background-color: #555; /* Add a dark-grey background on hover */
}

</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Deals 69 logo" class="rounded float-start" style="width:100%; height:50px; "></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent"  style="margin:15px;">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active d-flex align-items-center text-dark" aria-current="page" href="/"><i class="fas fa-home me-2"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center text-dark" href="{{ URL('/coupons') }}"><i class="fas fa-tags me-2"></i>Coupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center text-dark" href="{{ route('stores') }}"><i class="fas fa-store me-2"></i>Stores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center text-dark" href="{{ route('categories') }}"><i class="fas fa-th-list me-2"></i>Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center text-dark" href="{{ route('blog') }}"><i class="fas fa-blog me-2"></i>Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center text-dark" href="{{ route('contact') }}"><i class="fas fa-envelope me-2"></i>Contact</a>
                    </li>
                </ul>
                <form action="{{ route('searchResults') }}" method="GET" class="d-flex ms-auto" role="search" style="height:40px">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="searchInput" name="query" style="max-width: 250px;">
                    <button class="btn btn-primary text-dark" type="submit"><i class="fas fa-search me-1"></i></button>
                </form>
            </div>
        </div>
    </nav>
   <!-- Loader -->
   <button onclick="topFunction()" id="myBtn" title="Go to top"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0m-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707z"/>
  </svg>

   </button>
   <div id="loader" class="loader"></div>

   <script>
     // Hide the loader once the page is fully loaded
     window.addEventListener('load', function() {
       var loader = document.getElementById('loader');
       loader.style.display = 'none';
     });
   </script>
<script>
    let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
</body>
</html>
