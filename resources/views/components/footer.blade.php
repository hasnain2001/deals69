<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>footer </title>

</head>
<body>
    <footer>
        <section class="footer bg-info text-white">
          <div class="container py-5">
            <div class="row">
              <div class="col-md-4 d-flex align-items-center mb-3 mb-md-0">
                <img src="{{ asset('images/deals691.png') }}" alt="Alpha AI Logo" class="img-fluid" style="width:250px;">
              </div>
              <div class="col-md-4 mb-3 mb-md-0">
                <h4 class="text-dark">Info</h4>
                <ul class="list-unstyled">
                  <li><a class="text-dark d-flex align-items-center text-decoration-none" href="/"><i class="fas fa-home me-2"></i>Home</a></li>
                  <li><a class="text-dark d-flex align-items-center text-decoration-none" href="{{ route('contact') }}"><i class="fas fa-envelope me-2"></i>Contact us</a></li>
                  <li><a class="text-dark d-flex align-items-center text-decoration-none" href="{{ route('about') }}"><i class="fas fa-info-circle me-2"></i>About us</a></li>
                  <li><a class="text-dark d-flex align-items-center text-decoration-none" href="{{ route('term_and_condition') }}"><i class="fas fa-file-alt me-2"></i>Terms and Condition</a></li>
                  <li><a class="text-dark d-flex align-items-center text-decoration-none" href="{{ route('privacy') }}"><i class="fas fa-lock me-2"></i>Privacy Policy</a></li>
                </ul>
              </div>
              <div class="col-md-4">
                <div class="row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <h4 class="text-dark">Follow Us</h4>
                    <div class="d-flex">
                      <a href="https://www.facebook.com/deals69official" target="_blank" class="text-dark me-3"><i class="fab fa-facebook-f fa-2x"></i></a>
                      <a href="https://www.instagram.com/officialdeals69/" target="_blank" class="text-dark me-3"><i class="fab fa-instagram fa-2x"></i></a>
                      <a href="https://www.pinterest.com/deals69official/" target="_blank" class="text-dark"><i class="fab fa-pinterest fa-2x"></i></a>
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
