<header id="header" class="header bg-white shadow-sm fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    {{-- Logo --}}
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
      <span class="h4 mb-0 text-warning fw-bold">Explore</span>
      <span class="h4 mb-0 text-danger fw-bold ms-1">Mandar</span>
    </a>

    {{-- Desktop Nav --}}
    <nav class="d-none d-xl-flex align-items-center">
      <ul class="nav">
        <li class="nav-item"><a class="nav-link active" href="{{ route('tamu.beranda') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('/about1') }}">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="{{  route('tamu.produk') }}">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tamu.wisata') }}">Wisata</a></li>
      </ul>
    </nav>

    {{-- Search & Auth --}}
    <div class="d-flex align-items-center">
      {{-- Search form --}}
      <form class="d-flex me-4" action="{{  url('/')}}" method="GET">
        <input class="form-control form-control-sm me-2" type="search" name="q" placeholder="Cari Wisata..." />
        <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>

      {{-- Social icons --}}
<div class="d-none d-lg-flex align-items-center me-4">


  {{-- Ikon Keranjang --}}
  <a href="{{ route('pembeli.keranjang') }}" class="text-muted me-3"><i class="bi bi-cart3"></i></a>

  {{-- Ikon Detail Pesanan --}}
  <a href="{{ route('pembeli.detailpesanan') }}" class="text-muted"><i class="bi bi-receipt-cutoff"></i></a>
</div>

      {{-- Auth links --}}
      <ul class="nav">
        @if (Route::has('login'))
          @auth
            <!-- Tombol Logout -->
            <li class="nav-item">
              <form action="{{ route('logout') }}" method="POST" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">
                  <i class="bi bi-box-arrow-right me-1"></i> Logout
                </button>
              </form>
            </li>
          @else
            <li class="nav-item me-2">
              <a class="btn btn-sm btn-outline-primary" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
              </a>
            </li>
            @if (Route::has('register'))
              <li class="nav-item">
                <a class="btn btn-sm btn-primary" href="{{ route('register') }}">
                  <i class="bi bi-pencil-square me-1"></i> Register
                </a>
              </li>
            @endif
          @endauth
        @endif
      </ul>
    </div>

    {{-- Mobile toggle --}}
    <button class="btn d-xl-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
      <i class="bi bi-list fs-3"></i>
    </button>

  </div>

  {{-- Offcanvas mobile menu --}}
  <div class="offcanvas offcanvas-end" tabindex="-1" id="mobileMenu">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title">Menu</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
      <ul class="nav flex-column mb-4">
   <li class="nav-item"><a class="nav-link active" href="{{ route('tamu.beranda') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('about1') }}">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="{{  route('tamu.produk') }}">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('tamu.wisata') }}">Wisata</a></li>
      </ul>
      
      {{-- Search Form in Mobile Menu --}}
      <form class="d-flex mb-4" action="{{ route('wisata.search') }}" method="GET">
        <input class="form-control me-2" type="search" name="q" placeholder="Cari Wisata..." />
        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
      </form>

      {{-- Login/Register Button in Mobile --}}
      <div class="d-flex">
        @if (Route::has('login'))
          @auth
            <!-- Tombol Logout -->
            <form action="{{ route('logout') }}" method="POST" class="w-100">
              @csrf
              <button type="submit" class="btn btn-danger w-100">
                Logout
              </button>
            </form>
          @else
            <a class="btn btn-outline-primary me-2 w-50" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
              <a class="btn btn-primary w-50" href="{{ route('register') }}">Register</a>
            @endif
          @endauth
        @endif
      </div>
    </div>
  </div>

</header>

{{-- Konten utama --}}
<main class="container pt-5 mt-5">  <!-- Menambahkan margin-top menggunakan Bootstrap -->
  <div class="row">
    <div class="col">

    </div>
  </div>
</main>
