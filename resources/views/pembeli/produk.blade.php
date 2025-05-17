@extends('master1')

@section('konten')

  <main class="main">

    <div class="container my-5">
      <div class="row">

        <!-- Main Content -->
        <div class="col-lg-8">

          <section class="category-postst section">
            <div class="row gy-4">
              @forelse($wisatas as $wisata)
                <div class="col-lg-6">
                  <article class="card h-100 shadow-sm">
                    @if($wisata->gambar)
                      <img src="{{ asset('storage/'.$wisata->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;" alt="{{ $wisata->nama }}">
                    @else
                      <div class="bg-secondary" style="height:200px;"></div>
                    @endif
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">{{ $wisata->nama }}</h5>
                      <p class="text-muted mb-2">
                        <i class="bi bi-geo-alt-fill"></i>
                        <a href="{{ $wisata->lokasi }}" target="_blank" class="text-decoration-none">
                          Lihat di Google Maps
                        </a>
                      </p>
                      <p class="flex-grow-1">{{ Str::limit($wisata->deskripsi, 100, '...') }}</p>
                      <a href="{{ route('wisata.show', $wisata->id) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
                    </div>
                  </article>
                </div>
              @empty
                <div class="col-12">
                  <div class="alert alert-info text-center">Belum ada wisata.</div>
                </div>
              @endforelse
            </div>
          </section>

          <!-- Pagination -->
          <section class="pagination-2 section">
            <div class="d-flex justify-content-center mt-4">
              {{ $wisatas->links('pagination::bootstrap-5') }}
            </div>
          </section>

        </div>

        <!-- Sidebar -->
        <div class="col-lg-4 sidebar">
          <div class="widgets-container">

            <!-- Search Widget -->
            <div class="widget-item mb-4">
              <h3 class="widget-title">Cari Wisata</h3>
              <form action="{{ route('wisata.search') }}" method="GET">
                <div class="input-group">
                  <input type="text" name="q" class="form-control" placeholder="Cari...">
                  <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                </div>
              </form>
            </div>

            <!-- Lokasi Widget -->
            <div class="widget-item mb-4">
              <h3 class="widget-title">Filter Lokasi</h3>
              <div class="d-grid gap-2">
                @foreach($lokasiList as $lokasi)
                  <form action="{{ route('wisata.byLokasi', $lokasi) }}" method="GET">
                    <button type="submit" class="btn btn-outline-primary btn-sm w-100 text-truncate">
                      {{ Str::limit($lokasi, 25) }} 
                      <span class="badge bg-secondary">{{ $lokasiCounts[$lokasi] }}</span>
                    </button>
                  </form>
                @endforeach
              </div>
            </div>
            

            <!-- Recent Wisata Widget -->
            <div class="widget-item">
              <h3 class="widget-title">Wisata Terbaru</h3>
              @foreach($recentWisata as $recent)
                <div class="post-item d-flex align-items-center mb-3">
                  @if($recent->gambar)
                    <img src="{{ asset('storage/'.$recent->gambar) }}" alt="" class="flex-shrink-0 rounded" style="width:60px; height:60px; object-fit:cover;">
                  @else
                    <div class="bg-secondary rounded flex-shrink-0" style="width:60px; height:60px;"></div>
                  @endif
                  <div class="ms-3">
                    <h6 class="mb-1">
                      <a href="{{ route('wisata.show', $recent->id) }}">{{ Str::limit($recent->nama, 25) }}</a>
                    </h6>
                    <small class="text-muted">{{ $recent->created_at->format('d M Y') }}</small>
                  </div>
                </div>
              @endforeach
            </div>

          </div>
        </div>

      </div>
    </div>

  </main>

@endsection
