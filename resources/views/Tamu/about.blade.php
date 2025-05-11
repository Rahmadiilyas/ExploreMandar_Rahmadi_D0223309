@extends('master2')
@section('konten')
<body class="about-page">
  <main class="main">

    <!-- Page Title -->
    <div class="page-title">
      <div class="breadcrumbs">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i class="bi bi-house"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="#">Informasi</a></li>
            <li class="breadcrumb-item active current">Tentang</li>
          </ol>
        </nav>
      </div>

      <div class="title-wrapper">
        <p>Temukan pesona kuliner dan wisata khas Mandar yang kaya rasa dan budaya. Platform ini hadir untuk memperkenalkan keindahan dan cita rasa lokal kepada dunia.</p>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <span class="section-badge"><i class="bi bi-info-circle"></i> Tentang Kami</span>
        <div class="row">
          <div class="col-lg-6">
            <h2 class="about-title">Eksplorasi Kuliner dan Wisata Mandar</h2>
            <p class="about-description">Platform ini bertujuan untuk memperkenalkan berbagai makanan tradisional khas Mandar serta destinasi wisata yang menawan di Sulawesi Barat.</p>
          </div>
          <div class="col-lg-6">
            <p class="about-text">Kami hadir sebagai jembatan antara masyarakat lokal, pelaku UMKM, dan wisatawan yang ingin merasakan kekayaan budaya Mandar melalui rasa dan pengalaman alam.</p>
            <p class="about-text">Dengan inovasi digital, kami mendukung pelestarian kearifan lokal dan memajukan ekonomi daerah melalui promosi kuliner dan wisata berbasis komunitas.</p>
          </div>
        </div>

        <div class="row features-boxes gy-4 mt-3">
          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="feature-box">
              <div class="icon-box">
                <i class="bi bi-bullseye"></i>
              </div>
              <h3><a href="#" class="stretched-link">Kuliner Khas Mandar</a></h3>
              <p>Dari Jepa, Kambu Paria, hingga Tetu – rasakan kelezatan kuliner tradisional yang penuh cerita dan warisan leluhur.</p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="feature-box">
              <div class="icon-box">
                <i class="bi bi-person-check"></i>
              </div>
              <h3><a href="#" class="stretched-link">Wisata Alam Eksotis</a></h3>
              <p>Jelajahi pantai-pantai indah, air terjun tersembunyi, dan situs budaya yang sarat nilai sejarah di Mandar.</p>
            </div>
          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="feature-box">
              <div class="icon-box">
                <i class="bi bi-clipboard-data"></i>
              </div>
              <h3><a href="#" class="stretched-link">Dukungan UMKM Lokal</a></h3>
              <p>Kami memberdayakan pelaku usaha kuliner dan pariwisata lokal agar dapat berkembang melalui platform digital.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- /About Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tim Kami</h2>
        <div><span>Kenali</span> <span class="description-title">Tim Pengembang</span></div>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('assets/img/fardina.jpg') }}" class="img-fluid" alt="Fardina" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Fardina</h4>
                <span>Marketing & Publikasi</span>
                <p>Berperan dalam promosi kuliner khas Mandar dan memperluas jangkauan wisata lokal ke berbagai kalangan masyarakat.</p>
                <div class="social">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-twitter-x"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                  <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
            <div class="team-member d-flex">
              <div class="member-img">
                <img src="{{ asset('assets/img/fardina.jpg') }}" class="img-fluid" alt="Rahmadi" loading="lazy">
              </div>
              <div class="member-info flex-grow-1">
                <h4>Rahmadi</h4>
                <span>Operasional & Teknologi</span>
                <p>Mengelola sistem digital dan memastikan semua informasi kuliner dan wisata Mandar tersedia secara akurat dan interaktif.</p>
                <div class="social">
                  <a href="#"><i class="bi bi-facebook"></i></a>
                  <a href="#"><i class="bi bi-twitter-x"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                  <a href="#"><i class="bi bi-youtube"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>
      </div>
    </section><!-- /Team Section -->

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
@endsection
