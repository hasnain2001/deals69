<?php
header("X-Robots-Tag:index, follow");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Your custom meta tags go here -->
     <title>Deals69 - Best Deals and Discounts |Contact</title>
     <meta name="description" content="Find the best deals, discounts, and coupons on  Deals69. Save money on your favorite products from top brands.">

 <meta name="keywords" content="deals, discounts, coupons, savings, affiliate marketing">

  <meta name="author" content="John Doe">
 <meta name="robots" content="index, follow">
 
 <link rel="canonical" href="https://deals69.com/contact">
     <link rel="icon" href="{{ asset('front/assets/images/icons.png') }}" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Bootstrap CSS v5.2.1 -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    
           <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<meta name='impact-site-verification' value='de4ec733-7974-4b7d-a7aa-611819cb6e0f'>


</head>

<body>

<x-component-name/>

<br><br>

<div class="container">
    <div class="row">
        <div class="col-md-6 contact_image">
            <img src="{{ asset('front/assets/images/contact.jpg') }}" class="img-fluid" alt="">
        </div>
        <div class="col-md-6 wrapper">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form method="post" action="{{ route('contact') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Enter your name">
                    @error('name') <div class="text-danger">{{$message}}</div> @enderror
                    <i class='fas fa-user'></i>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                    @error('email') <div class="text-danger">{{$message}}</div> @enderror
                    <i class='fas fa-envelope'></i>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="website" placeholder="Enter your website">
                    @error('website') <div class="text-danger">{{$message}}</div> @enderror
                    <i class='fas fa-globe'></i>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Write your message" name="message"></textarea>
                    @error('message') <div class="text-danger">{{$message}}</div> @enderror
                    <i class="material-icons">message</i>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Send Message</button>
                    <span></span>
                </div>
            </form>
        </div>
    </div>
</div>

<br>


    
    <br>
  <x-footer/>
     <script>
$(document).ready(function() {
    $('#searchInput').autocomplete({
        source: function(request, response) {
            $.ajax({
                url: '{{ route("searchResults") }}',
                dataType: 'json',
                data: {
                    query: request.term
                },
                success: function(data) {
                    response(data.stores);
                }
            });
        },
        minLength:1 // Minimum characters before autocomplete starts
    });
});



</script>
<script>
    //Contact Form in PHP
const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span");
form.onsubmit = (e)=>{
  e.preventDefault();
  statusTxt.style.color = "#0D6EFD";
  statusTxt.style.display = "block";
  statusTxt.innerText = "Sending your message...";
  form.classList.add("disabled");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "message.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState == 4 && xhr.status == 200){
      let response = xhr.response;
      if(response.indexOf("required") != -1 || response.indexOf("valid") != -1 || response.indexOf("failed") != -1){
        statusTxt.style.color = "red";
      }else{
        form.reset();
        setTimeout(()=>{
          statusTxt.style.display = "none";
        }, 3000);
      }
      statusTxt.innerText = response;
      form.classList.remove("disabled");
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);
}
</script>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('front/assets/js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
