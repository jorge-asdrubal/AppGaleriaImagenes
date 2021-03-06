<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Login</title>
        <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet"/>
        <script src="{{ asset('assets/admin/js/all.min.js') }}"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    @if (Session::has('success'))
                                        <div class="card-body">
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="card-body">
                                            @foreach ($errors->all() as $item)
                                                <div class="alert alert-danger" role="alert">{{ $item }}</div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('signin') }}">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" id="email" type="email" placeholder="name@example.com" />
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{ route('users.register') }}">Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Jorge Asdr??bal Ortega Gonzalez 2021 <br> Phone: +57 3116519569 <br> Email: jaog.11.2003@gmail.com</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
    </body>
</html>
