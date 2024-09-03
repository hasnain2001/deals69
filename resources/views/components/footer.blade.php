<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Footer</title>
  <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.min.css') }}">
  <style>
    /* Custom styles for the Info section */
    .info-section {

      padding: 20px;
      border-radius: 8px;
      text-align: left;
      align-items: left;
    }

    .info-section h4 {
      color: #f8f9fa; /* Light color for the heading */
      margin-bottom: 20px;
    }

    .info-section ul {
      padding: 0;
      list-style: none;
    }

    .info-section li {
      margin-bottom: 10px;
    }

    .info-section a {
      color: black; /* Gold color for links */
      text-decoration: none;
      font-weight: bold;
    }

    .info-section a:hover {
      color: #fff; /* White color on hover */
    }

    .social-icons a {
      color: black; /* Matching gold color for icons */
    }

    .social-icons a:hover {
      color: #fff; /* White color on hover */
    }

    .footer-container {
      max-width: 1200px;
      margin: auto;
    }
  </style>
</head>
<body>
  <footer>
    <section class="footer bg-info text-white">
      <div class="footer-container py-5">
        <div class="row justify-content-center">
          <!-- Logo Section -->
          <div class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0">
            <img src="{{ asset('images/deals691.png') }}" alt="Alpha AI Logo" class="img-fluid" style="width:200px;">
          </div>
          <!-- Info Section -->
          <div class="col-md-4 mb-3 mb-md-0 info-section">
            <h4>Info</h4>
            <ul class="list-unstyled">
              <li><a class=" " href="/"><i class="fas fa-home me-2"></i>Home</a></li>
              <li><a class=" " href="{{ route('contact') }}"><i class="fas fa-envelope me-2"></i>Contact us</a></li>
              <li><a class=" " href="{{ route('about') }}"><i class="fas fa-info-circle me-2"></i>About us</a></li>
              <li><a class="" href="{{ route('term_and_condition') }}"><i class="fas fa-file-alt me-2"></i>Terms and Condition</a></li>
              <li><a class=" " href="{{ route('privacy') }}"><i class="fas fa-lock me-2"></i>Privacy Policy</a></li>
            </ul>
          </div>
          <!-- Follow Us and Contact Us Section -->
          <div class="col-md-4 text-md-start text-center">
            <div class="row">
              <div class="col-sm-6 mb-3 mb-sm-0">
                <h4 class="text-dark">Follow Us</h4>
                <div class="d-flex justify-content-center justify-content-md-start social-icons">
                  <a href="https://www.facebook.com/deals69official" target="_blank" class="me-3"><i class="fab fa-facebook-f fa-2x"></i></a>
                  <a href="https://www.instagram.com/officialdeals69/" target="_blank" class="me-3"><i class="fab fa-instagram fa-2x"></i></a>
                  <a href="https://www.pinterest.com/deals69official/" target="_blank"><i class="fab fa-pinterest fa-2x"></i></a>
                </div>
              </div>
              <div class="col-sm-6">
                <h4 class="text-dark">Contact Us</h4>
                <p class="mb-1 text-dark"><i class="fas fa-envelope me-2"></i>deeaalss69@gmail.com</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center py-3 border-top text-muted">
        <p class="text-dark mb-0">Developed By <a class="tex-decoration-none text-dark" href="https://alphaisoft.com/" target="blank">Alpha Ai Solution</a></p>
      </div>
    </section>
  </footer>

  <script src="{{ asset('bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
</body>
</html>
