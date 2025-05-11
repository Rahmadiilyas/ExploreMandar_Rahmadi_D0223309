@extends('master')

@section('konten')
<div class="container mt-5">
    <h3>Beli Produk: {{ $produk->nama }}</h3>
    <p>Harga: Rp. {{ number_format($produk->harga, 0, ',', '.') }}</p>

    <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" value="1" class="form-control" min="1">
        </div>
        <button type="submit" class="btn btn-success mt-2">Tambahkan ke Keranjang</button>
    </form>
</div>
@endsection
