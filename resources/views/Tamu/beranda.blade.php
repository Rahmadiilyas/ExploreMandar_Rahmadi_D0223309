<?php /* resources/views/view_mandar.blade.php */ ?>

@extends('master2')
@section('konten')
<body class="index-page">

  <main class="main">

    <!-- Blog Hero Section -->
    <section id="blog-hero" class="blog-hero section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="blog-grid">

          <!-- Featured Cultural Post -->
          <article class="blog-item featured" data-aos="fade-up">
            <img src="{{ asset('sy.jpg') }}" alt="Pesta Rokatua" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">Mei 10, 2025</span>
                <span class="category">Tradisi</span>
              </div>
              <h2 class="post-title">
                <a href="#" title="Pesta Rokatua: Warisan Budaya Mandar">Sayyang pattudu: Warisan Budaya Mandar</a>
              </h2>
            </div>
          </article>

          <!-- Regular Culture Posts -->
          <article class="blog-item" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('tr.jpg') }}" alt="Tari Gandrung Mandar" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">April 20, 2025</span>
                <span class="category">Seni</span>
              </div>
              <h3 class="post-title">
                <a href="#" title="Tari Gandrung Mandar: Keindahan Gerak">Tari Gandrung Mandar: Keindahan Gerak</a>
              </h3>
            </div>
          </article>

          <article class="blog-item" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('th (2).jpg') }}" alt="Kuliner Lakat" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">April 25, 2025</span>
                <span class="category">Kuliner</span>
              </div>
              <h3 class="post-title">
                <a href="{{ route('pembeli.produk') }}" title="Mengenal Lakat: Makanan Khas Mandar">Mengenal Bau piapi: Makanan Khas Mandar</a>
              </h3>
            </div>
          </article>
          <article class="blog-item" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('th (1).jpg') }}" alt="Kuliner Lakat" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">April 25, 2025</span>
                <span class="category">Kuliner</span>
              </div>
              <h3 class="post-title">
                <a href="{{ route('pembeli.produk') }}" title="Mengenal Lakat: Makanan Khas Mandar">Mengenal Bolu Paranggi: Makanan Khas Mandar</a>
              </h3>
            </div>
          </article>
          <article class="blog-item" data-aos="fade-up" data-aos-delay="200">
            <img src="{{ asset('OIP.jpg') }}" alt="Kuliner Lakat" class="img-fluid">
            <div class="blog-content">
              <div class="post-meta">
                <span class="date">April 25, 2025</span>
                <span class="category">Kuliner</span>
              </div>
              <h3 class="post-title">
                <a href="{{ route('pembeli.produk') }}" title="Mengenal Lakat: Makanan Khas Mandar">Mengenal Tetu: Makanan Khas Mandar</a>
              </h3>
            </div>
          </article>

        </div>
      </div>
    </section>

    <!-- Featured Posts Section -->
    <section id="featured-posts" class="featured-posts section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Artikel Unggulan</h2>
        <div><span>Jelajahi</span> <span class="description-title">Budaya Mandar</span></div>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="blog-posts-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            { "loop": true, "speed": 800, "autoplay": { "delay": 5000 }, "slidesPerView": 3, "spaceBetween": 30, "breakpoints": { "320": { "slidesPerView": 1, "spaceBetween": 20 }, "768": { "slidesPerView": 2, "spaceBetween": 20 }, "1200": { "slidesPerView": 3, "spaceBetween": 30 } } }
          </script>

          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="blog-post-item">
                <img src="{{ asset('by.jpg') }}" alt="Rumah Adat Balla" class="img-fluid">
                <div class="blog-post-content">
                  <div class="post-meta">
                    <span><i class="bi bi-person"></i> Tim Mandar</span>
                    <span><i class="bi bi-clock"></i> Feb 5, 2025</span>
                    <span><i class="bi bi-chat-dots"></i> 12 Komentar</span>
                  </div>
                  <h2><a href="{{ route('pembeli.wisata') }}">Boyyang kayyang: Simbol Keharmonisan Keluarga Mandar</a></h2>
                  <p>Pelajari struktur unik dan makna filosofis di balik arsitektur tradisional Mandar.</p>
                  <a href="{{ route('pembeli.wisata') }}" class="read-more">Baca Selengkapnya <i class="bi bi-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <!-- Tambahkan slide lain sesuai kebutuhan -->
          </div>
        </div>
      </div>
    </section>

    <!-- Category Section -->
    <section id="category-section" class="category-section section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Kategori Budaya</h2>
        <div><span>Pilih</span> <span class="description-title">Kategori</span></div>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 mb-4">
          <div class="col-lg-4">
            <article class="featured-post">
              <div class="post-img">
                <img src="{{ asset('assets/img/mandar/ukiran-kayu.jpg') }}" alt="Ukiran Kayu" class="img-fluid" loading="lazy">
              </div>
              <div class="post-content">
                <div class="category-meta">
                  <span class="post-category">Kerajinan</span>
                  <div class="author-meta">
                    <img src="{{ asset('assets/img/person/person-m-10.webp') }}" alt="" class="author-img">
                    <span class="author-name">Dewi Mandar</span>
                    <span class="post-date">12 Maret 2025</span>
                  </div>
                </div>
                <h2 class="title"><a href="#">Keindahan Ukiran Kayu Mandar</a></h2>
              </div>
            </article>
          </div>
          <!-- Tambahkan artikel kategori lain -->
        </div>
      </div>
    </section>

    <!-- Call To Action 2 Section -->
    <section id="call-to-action-2" class="call-to-action-2 section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="advertise-1 d-flex flex-column flex-lg-row gap-4 align-items-center position-relative">

          <div class="content-left flex-grow-1" data-aos="fade-right" data-aos-delay="200">
            <span class="badge text-uppercase mb-2">Jangan Lewatkan</span>
            <h2>Rasakan Pesona Budaya Mandar Sekarang</h2>
            <p class="my-4">Selami keunikan tradisi, tari, dan kuliner khas Mandar yang memikat setiap pengunjung.</p>

            <div class="features d-flex flex-wrap gap-3 mb-4">
              <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Tur Budaya</span></div>
              <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Workshop Tari</span></div>
              <div class="feature-item"><i class="bi bi-check-circle-fill"></i><span>Demo Masak Tradisional</span></div>
            </div>

            <div class="cta-buttons d-flex flex-wrap gap-3">
              <a href="#" class="btn btn-primary">Gabung Sekarang</a>
              <a href="#" class="btn btn-outline">Pelajari Lebih Lanjut</a>
            </div>
          </div>

          <div class="content-right position-relative" data-aos="fade-left" data-aos-delay="300">
            <img src="{{ asset('assets/img/mandar/event.jpg') }}" alt="Event Budaya Mandar" class="img-fluid rounded-4">
            <div class="floating-card">
              <div class="card-icon"><i class="bi bi-people-fill"></i></div>
              <div class="card-content"><span class="stats-number">500+</span><span class="stats-text">Peserta Terdaftar</span></div>
            </div>
          </div>

          <div class="decoration"><div class="circle-1"></div><div class="circle-2"></div></div>
        </div>
      </div>
    </section>

    <!-- Latest Posts Section -->
    <section id="latest-posts" class="latest-posts section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Artikel Terbaru</h2>
        <div><span>Update</span> <span class="description-title">Budaya Mandar</span></div>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-4">
            <article>
              <div class="post-img"><img src="{{ asset('assets/img/mandar/kapal-phinisi.jpg') }}" alt="Phinisi Mandar" class="img-fluid"></div>
              <p class="post-category">Transportasi</p>
              <h2 class="title"><a href="#">Phinisi Mandar: Kapal Tradisional Unggulan</a></h2>
              <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/person/person-m-11.webp') }}" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta"><p class="post-author">Andi P.</p><p class="post-date"><time datetime="2025-05-01">May 1, 2025</time></p></div>
              </div>
            </article>
          </div>
          <!-- Tambahkan artikel terbaru lainnya -->
        </div>
      </div>
    </section>

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4 justify-content-between align-items-center">
          <div class="col-lg-6">
            <div class="cta-content" data-aos="fade-up" data-aos-delay="200">
              <h2>Berlangganan Newsletter Mandar</h2>
              <p>Dapatkan info event, artikel, dan resep khas Mandar langsung ke email Anda.</p>
              <form action="{{ route('tamu.produk') }}" method="post" class="php-email-form cta-form" data-aos="fade-up" data-aos-delay="300">
                @csrf
                <div class="input-group mb-3">
                  <input type="email" name="email" class="form-control" placeholder="Alamat email..." required aria-label="Email address">
                  <button class="btn btn-primary" type="submit">Subscribe</button>
                </div>
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Terima kasih, langganan Anda berhasil!</div>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="cta-image" data-aos="zoom-out" data-aos-delay="200">
              <img src="{{ asset('assets/img/mandar/newsletter.jpg') }}" alt="Newsletter Mandar" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
@endsection