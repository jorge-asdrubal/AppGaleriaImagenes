<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Gallery</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/landing/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/landing/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="stylesheet" href}="{{ asset('assets/landing/assets/css/fonts.googleapis.css') }}"">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/assets/vendor/animate.css') }}/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/landing/assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/landing/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="height: 10%;">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="{{ route('gallery.index') }}">Gallery</a></h1>
            <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li><a href="{{ route('dashboard') }}">Go to administrator</a></li>
            </ul>
            </nav>
        </div>
    </header><!-- End Header -->
    <div class="row"></div>
    <main id="main">
        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title">
                    <h2>Gallery</h2>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="card-columns">
                      @foreach ($images as $image)
                        <div class="card">
                          <div class="portfolio-wrap">
                            <img src="{{ asset($image->url) }}" class="card-img-top" alt="Imagen">
                            <div class="portfolio-info">
                                <p>Publicada por: </p>
                                <h4>{{ $image->username }}</h4>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-center">
                        {{ $images->links() }}
                    </div>
                </div>
            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-title">
                    <h2>Contact</h2>
                    <p>Jorge Asdrúbal Ortega González.</p>
                </div>
                <div class="row contact-info">
                    <div class="col-md-6">
                        <div class="contact-phone">
                            <i class="icofont-phone"></i>
                            <h3>Phone Number</h3>
                            <p><a href="tel:+573116519569">+57 311 651 9569</a></p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="contact-email">
                            <i class="icofont-envelope"></i>
                            <h3>Email</h3>
                            <p><a href="mailto:jaog.11.2003@gmail.com">jaog.11.2003@gmail.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Gallery</h3>
              <p>
                <strong>Phone:</strong> +57 311 651 9569<br>
                <strong>Email:</strong> jaog.11.2003@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a target="_blank" href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a target="_blank" href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a target="_blank" href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a target="_blank" href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a target="_blank" href="https://www.linkedin.com/in/jorge-asdrubal-ortega-gonzalez-b1207b212/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Gallery Jorge Asdrúbal Ortega González</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/landing/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/waypoints/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/venobox/venobox.min.js') }}"></script>
  <script src="{{ asset('assets/landing/assets/vendor/owl.carousel/owl.carousel.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/landing/assets/js/main.js') }}"></script>

</body>

</html>