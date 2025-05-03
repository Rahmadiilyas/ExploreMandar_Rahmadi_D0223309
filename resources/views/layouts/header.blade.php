
<header id="header" class="header position-relative">
    <div class="container-fluid container-xl position-relative">

      <div class="top-row d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-end">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.webp" alt=""> -->
          <span style="color: orange; font-weight: bold;">Explore</span>
          <span class="text-danger fw-bold">Mandar</span>
        </a>

        <div class="d-flex align-items-center">
          <div class="social-links">
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
          </div>

          <form class="search-form ms-4">
            <input type="text" placeholder="Search..." class="form-control">
            <button type="submit" class="btn"><i class="bi bi-search"></i></button>
          </form>
        </div>
      </div>

    </div>

    <div class="nav-wrap">
      <div class="container d-flex justify-content-center position-relative">
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="about.html">Tentang Kami</a></li>
                <li><a href="category.html">Produk</a></li>
                <li><a href="blog-details.html">Wisata</a></li>
                {{-- <li><a href="author-profile.html" class="active">Profile</a></li> --}}
                {{-- <li><a href="contact.html">Contact</a></li> --}}
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}">Login</a>
                        </li>
              
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
              </ul>
              
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>

  </header>