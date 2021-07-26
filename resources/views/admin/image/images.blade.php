<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>My gallery</title>

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

            <h1 class="logo mr-auto"><a href="{{ route('image.index') }}">My gallery</a></h1>
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
                    <h2>My gallery</h2>
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-success" href="{{ route('image.create') }}"><i class="fas fa-plus"></i>New image</a>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="card row">
                        <div class="card-header">
                            Error ocurred
                        </div>
                        <div class="card-body">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="row">
                  <div class="col">
                    <div class="card-columns">
                      @foreach ($images as $image)
                        <div class="card">
                            <div class="card-header">
                                @if ($image->state == 0)
                                    <h5>Not published</h5>
                                @endif
                                @if ($image->state == 1)
                                    <h5>Published</h5>
                                @endif
                            </div>
                            <img src="{{ asset($image->url) }}" class="card-img-top" alt="Imagen">
                            <div class="card-footer">
                                <form class="d-inline-block form-delete" action="{{ route('image.delete') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id_image" value="{{ $image->id_image }}">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @if ($image->state == 0)
                                    <form class="d-inline-block" action="{{ route('image.public') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_image" value="{{ $image->id_image }}">
                                        <button type="submit" class="btn btn-success btn-sm">Publish image</button>
                                    </form>
                                @endif
                                @if ($image->state == 1)
                                    <form class="d-inline-block" action="{{ route('image.private') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id_image" value="{{ $image->id_image }}">
                                        <button type="submit" class="btn btn-secondary btn-sm">Private image</button>
                                    </form>
                                @endif
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

    <script src="{{ asset('assets/admin/js/sweetalert2@11.js') }}"></script>

    @if (Session::has('success'))
        <script>
            Swal.fire(
                'Deleted!',
                'Successfully deleted.',
                'success'
            )
        </script>
    @endif

    <script>
        $('.form-delete').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>
</body>

</html>