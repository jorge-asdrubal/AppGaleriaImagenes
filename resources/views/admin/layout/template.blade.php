<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('title')</title>
        <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet"/>
        @yield('styles')    
    </head>
    <body class="sb-nav-fixed">
        @include('admin.layout.template.header')
        <div id="layoutSidenav">
            @include('admin.layout.template.sidebar')
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('admin.layout.template.footer')
            </div>
        </div>
        <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/all.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/scripts.js') }}"></script>

        @yield('scripts')
    </body>
</html>
