@extends('master1')

@section('konten')
<div class="container mt-5">
    <h2>Checkout</h2>

    <!-- Menampilkan notifikasi jika ada error atau sukses -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Menampilkan daftar produk di keranjang -->
    <div class="row">
        @foreach($keranjang as $item)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/'.$item->produk->gambar) }}" class="card-img-top" alt="produk image">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->produk->nama }}</h5>
                    <p class="card-text">Harga: Rp. {{ number_format($item->produk->harga, 0, ',', '.') }}</p>
                    <p class="card-text">Jumlah: {{ $item->jumlah }}</p>
                    <p class="card-text">Total: Rp. {{ number_format($item->produk->harga * $item->jumlah, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Form Checkout -->
    <form action="{{ route('keranjang.prosesCheckout') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <label for="nama_penerima">Nama Penerima</label>
            <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" required>
        </div>
        <div class="form-group mt-3">
            <label for="nomor_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" name="nomor_telepon" id="nomor_telepon" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat Pengiriman</label>
            <textarea class="form-control" name="alamat" id="alamat" rows="4" required></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select class="form-control" name="metode_pembayaran" id="metode_pembayaran" required>
                <option value="">-- Pilih Metode --</option>
                <option value="cod">Cash on Delivery</option>
                <option value="transfer">Transfer Bank</option>
            </select>
        </div>

        <div class="form-group mt-3" id="bukti_pembayaran_group" style="display: none;">
            <label for="bukti_pembayaran">Unggah Bukti Pembayaran</label>
            <input type="file" class="form-control" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary mt-4">Proses Pembayaran</button>
    </form>
</div>

<script>
    // Menampilkan input bukti pembayaran jika metode pembayaran adalah transfer
    document.getElementById('metode_pembayaran').addEventListener('change', function() {
        var metodePembayaran = this.value;
        if (metodePembayaran === 'transfer') {
            document.getElementById('bukti_pembayaran_group').style.display = 'block';
        } else {
            document.getElementById('bukti_pembayaran_group').style.display = 'none';
        }
    });
</script>

@endsection
