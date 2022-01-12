<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <div class="sidebar-brand-text mx-3">My Ecommerce</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Products -->
    <li class="nav-item @yield('categories')">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-list"></i>
            <span>Categories</span></a>
    </li>

    <!-- Categories -->
    <li class="nav-item @yield('products')">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-box"></i>
            <span>Products</span></a>
    </li>

    <!-- Users -->
    <li class="nav-item @yield('users')">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>