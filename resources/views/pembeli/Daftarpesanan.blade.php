<!-- detailPesanan.blade.php -->

@extends('master')

@section('konten')
<div class="container mt-5">
    <h2>Detail Pesanan</h2>

    <div class="alert alert-info">
        Status Pesanan: <strong>{{ $pesanan->status }}</strong><br>
        Status Pembayaran: <strong>{{ $pesanan->status_pembayaran }}</strong>
    </div>

    @if($pesanan->status_pembayaran === 'menunggu')
    <div class="alert alert-warning">
        Pesanan Anda sedang menunggu persetujuan dari kreator. Harap menunggu konfirmasi lebih lanjut.
    </div>
    @elseif($pesanan->status_pembayaran === 'lunas')
    <div class="alert alert-success">
        Pesanan Anda telah disetujui dan sedang diproses untuk pengiriman.
    </div>
    @endif

    <div class="row">
        @foreach($pesanan->detailPesanan as $detail)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$detail->produk->gambar) }}" class="card-img-top" alt="produk image">
                <div class="card-body">
                    <h5 class="card-title">{{ $detail->produk->nama }}</h5>
                    <p class="card-text">Harga: Rp. {{ number_format($detail->produk->harga, 0, ',', '.') }}</p>
                    <p class="card-text">Jumlah: {{ $detail->jumlah }}</p>
                    <p class="card-text">Total: Rp. {{ number_format($detail->sub_total, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection
