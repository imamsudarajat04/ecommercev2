<!-- navbar-->
<header class="header bg-white">
    <div class="container px-0 px-lg-3">
      <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="/"><span class="font-weight-bold text-uppercase text-dark">My Ecommerce</span></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <!-- Link--><a class="nav-link @yield('welcome')" href="/">Home</a>
            </li>
            <li class="nav-item">
              <!-- Link--><a class="nav-link @yield('shop')" href="{{ route('shop.index') }}">Shop</a>
            </li>
          </ul>
          @auth
            <ul class="navbar-nav ml-auto">               
                {{-- <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li> --}}
                <li class="nav-item"><a class="nav-link @yield('carts')" href="{{ route('carts.index') }}"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="/dashboard"> <i class="fas fa-user-alt mr-1 text-gray"></i>Dashboard</a></li>
            </ul>
          @else
            <ul class="navbar-nav ml-auto">               
                {{-- <li class="nav-item"><a class="nav-link" href="#"> <i class="far fa-heart mr-1"></i><small class="text-gray"> (0)</small></a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ route('carts.index') }}"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="/login"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
            </ul>
          @endauth
          
        </div>
      </nav>
    </div>
  </header>