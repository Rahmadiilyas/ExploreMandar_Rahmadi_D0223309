@extends('master1')

@section('konten')
<div class="container mt-5">
    <h2 class="text-center mb-4">Keranjang Belanja</h2>

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



    @if($items->isEmpty())
        <div class="alert alert-info text-center">
            Keranjang Anda masih kosong.
        </div>
    @else
        <div class="row">
            @php $total = 0; @endphp
            @foreach($items as $item)
                @php
                    $subtotal = $item->produk->harga * $item->jumlah;
                    $total += $subtotal;
                @endphp
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($item->produk->gambar)
                            <img src="{{ asset('storage/' . $item->produk->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->produk->nama }}</h5>
                            <p class="card-text">Harga: Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                            <p class="card-text">Jumlah: {{ $item->jumlah }}</p>
                            <p class="card-text fw-bold text-success">Subtotal: Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                            <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4 text-end">
            <h4>Total Belanja: <span class="text-success">Rp {{ number_format($total, 0, ',', '.') }}</span></h4>
            <a href="{{ route('keranjang.checkout') }}" class="btn btn-success btn-lg mt-2">Checkout Sekarang</a>
        </div>
    @endif
</div>
@endsection
