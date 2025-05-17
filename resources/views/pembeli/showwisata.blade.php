@extends('master1')

@section('konten')
<main class="main">

  {{-- Hero Section --}}
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          @if($wisata->gambar)
            <img src="{{ asset('storage/' . $wisata->gambar) }}"
                 class="img-fluid rounded shadow-sm"
                 alt="{{ $wisata->nama }}">
          @else
            <div class="bg-secondary rounded" style="height:300px;"></div>
          @endif
        </div>
        <div class="col-md-6">
          <h1 class="display-5">{{ $wisata->nama }}</h1>
          <p class="text-muted mb-2">
            <a href="{{ $wisata->lokasi }}" target="_blank" class="text-decoration-none">
              Lihat di Google Maps
            </a>
          </p>
          <a href="{{ route('pembeli.wisata') }}" class="btn btn-outline-primary me-2">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
          <a href="#deskripsi" class="btn btn-primary">Deskripsi <i class="bi bi-chevron-down"></i></a>
        </div>
      </div>
    </div>
  </section>

  {{-- Deskripsi --}}
  <section id="deskripsi" class="py-5">
    <div class="container">
      <h2>Deskripsi</h2>
      <p class="lead">{{ $wisata->deskripsi }}</p>
    </div>
  </section>

  {{-- CTA / Aksi --}}
  <section class="py-5 bg-primary text-white text-center">
    <div class="container">
      <h3>Siap menjelajah?</h3>
      <p>Hubungi kami untuk paket tur dan informasi lebih lanjut.</p>
      <a href="tel:+62123456789" class="btn btn-light btn-lg me-2">
        <i class="bi bi-telephone-fill"></i> Telepon
      </a>
      <a href="mailto:info@wisata.com" class="btn btn-outline-light btn-lg">
        <i class="bi bi-envelope-fill"></i> Email
      </a>
    </div>
  </section>

  {{-- Related Wisata --}}
  <section class="py-5">
    <div class="container">
      <h2 class="mb-4">Wisata Lainnya</h2>
      <div class="row gy-4">
        @foreach($related as $item)
          <div class="col-md-4">
            <div class="card h-100 shadow-sm">
              @if($item->gambar)
                <img src="{{ asset('storage/' . $item->gambar) }}"
                     class="card-img-top"
                     style="height:180px; object-fit:cover;"
                     alt="{{ $item->nama }}">
              @else
                <div class="bg-secondary" style="height:180px;"></div>
              @endif
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">{{ $item->nama }}</h5>
                <p class="card-text text-muted mb-2">
                  <i class="bi bi-geo-alt-fill"></i> {{ $item->lokasi }}
                </p>
                <a href="{{ route('pembeli.showwisata', $item->id) }}"
                   class="btn btn-outline-primary mt-auto">
                  Lihat Detail
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

</main>
@endsection
