@extends('master1')
@section('konten')
<div class="container mt-5">
    

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($produks as $produk)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/400x250?text=No+Image" class="card-img-top" alt="No Image" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div>
                            <h5 class="card-title">{{ $produk->nama }}</h5>
                            <p class="card-text text-muted" style="flex-grow: 1; overflow: hidden;">{{ $produk->deskripsi }}</p>
                        </div>
                        <div class="mt-auto">
                            <p class="card-text fw-bold text-start">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                                @csrf
                                <div class="input-group mb-2">
                                    <span class="input-group-text"><i class="bi bi-basket-fill"></i></span>
                                    <input type="number" name="jumlah" value="1" min="1" class="form-control">
                                </div>
                                <div class="d-flex gap-2">
                                    <form action="{{ route('keranjang.checkout') }}" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-success flex-fill" title="Beli Sekarang">
                                            <i class="bi bi-bag-check-fill"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-warning flex-fill" title="Masukkan ke Keranjang">
                                        <i class="bi bi-cart-plus-fill"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col text-center">
                <p class="text-muted">Belum ada produk tersedia.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
