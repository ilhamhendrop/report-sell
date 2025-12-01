<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('admin.dashboard.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link" href="{{ route('admin.user.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                User
            </a>
            <a class="nav-link" href="{{ route('sale.index') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-file"></i></div>
                Penjualan
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <label>{{ Auth::user()->name }}</label>
    </div>
</nav>
