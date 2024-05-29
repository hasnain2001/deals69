<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <footer>
    <section class="footer bg-info text-white">
      <div class="container py-5">
        <div class="row">
          <div class="col-md-4 d-flex align-items-center">
            <img src="{{ asset('images/dlogo-removebg-preview.png') }}" alt="Alpha AI Logo" class="img-fluid mr-3" style="max-width: 150px;">
          </div>
          <div class="col-md-4 mb-3 mb-md-0">
            <h4 class="text-decoration-none text-dark">Info</h4>
            <ul class="list-unstyled">
              <li><a class="text-white" href="/">Home</a></li>
              <li><a class="text-white" href="{{ route('contact') }}">Contact us</a></li>
              <li><a class="text-white" href="{{ route('about') }}">About us</a></li>
              <li><a class="text-white" href="terms_and_condition">Terms and Condition</a></li>
              <li><a class="text-white" href="privacy">Privacy Policy</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            <div class="row">
              <div class="col-sm-6 d-flex justify-content-end align-items">
                <div class="social">
                  <h3 class="text-dark">Follow Us</h3>
                  <a href="https://www.facebook.com/deals69official" target="_blank"><i class="fab fa-facebook-f text-white"></i></a>
                  <a href="https://www.instagram.com/officialdeals69/" target="_blank"><i class="fab fa-instagram text-white mx-3"></i></a>
                  <a href="https://www.pinterest.com/deals69official/" target="_blank"><i class="fab fa-pinterest text-white"></i></a>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="footer-section" style="font-size: 14px; color: #fff;">
                  <h3 class="text-dark">Contact Us</h3>
                  <p>Email: bdeal69@gmail.com</p>
                  <p>Email: contact@bdeals69.com</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center py-3 border-top text-muted">
        <p class="text-white">Developed By <a class="text-white" href="https://alphaisoft.com/">Alph Ai Solution</a></p>
      </div>
    </section>
  </footer>
</body>
</html>