<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Reset password</title>
        <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet" />
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset password</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('password.update') }}">
                                            @csrf
                                            <input type="hidden" name="token" value="{{ $token }}" readonly required>
                                            <input type="hidden" name="email" value="{{ $email ?? old('email') }}" required readonly>
                                            <div class="form-floating mb-3">
                                                <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password" placeholder="Password" />
                                                <label for="password">Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirm password" />
                                                <label for="password_confirmation">Confirm password</label>
                                            </div>
                                            <div class="d-flex justify-content-end mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary">Reset password</button>
                                            </div>
                                        </form>
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
                            <div class="text-muted">Copyright &copy; Jorge Asdrúbal Ortega Gonzalez 2021 <br> Phone: +57 3116519569 <br> Email: jaog.11.2003@gmail.com</div>
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
