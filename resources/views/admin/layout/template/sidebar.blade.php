<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                @if (Auth::user()->id_rol == 1)
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Users
                    </a>
                @endif
                <div class="sb-sidenav-menu-heading">Galleries</div>
                <a class="nav-link" href="{{ route('gallery.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-folder"></i></div>
                    Gallery
                </a>
                <a class="nav-link" href="{{ route('image.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-images"></i></div>
                    My images
                </a>
            </div>
        </div>
    </nav>
</div>