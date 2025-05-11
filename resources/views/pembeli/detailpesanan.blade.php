@extends('master1')

@section('konten')
<div class="container">
    <h4>Daftar Pesanan Saya</h4>

    @forelse ($pesanan as $item)
        <div class="card my-3">
            <div class="card-body">
                <h5>Status: 
                    @if ($item->pembayaran->status == 'menunggu')
                        <span class="text-warning">Menunggu Persetujuan</span>
                    @elseif ($item->pembayaran->status == 'ditolak')
                        <span class="text-danger">Ditolak</span> — <a href="{{ route('pembeli.produk') }}">Silakan beli lagi</a>
                    @elseif ($item->pembayaran->status == 'disetujui')
                        <span class="text-success">Disetujui</span><br>
                        Dikirim tanggal: {{ $item->updated_at->format('d-m-Y') }}<br>
                        Estimasi tiba: {{ $item->updated_at->addDays(1)->format('d-m-Y') }}

                        {{-- Tombol konfirmasi jika belum dikonfirmasi --}}
                        @if ($item->status_konfirmasi !== 'selesai')
                            <div class="mt-3">
                                <h6>Apakah pesanan sudah sampai?</h6>
                                <form action="{{ route('pesanan.konfirmasi', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="bi bi-check-circle-fill"></i> Iya
                                    </button>
                                </form>
                            </div>
                        @else
                            <div class="mt-2">
                                <span class="badge bg-success">Pesanan sudah sampai</span>
                            </div>
                        @endif
                    @endif
                </h5>

                <p>
                    <strong>Nama Penerima:</strong> {{ $item->pembayaran->nama_penerima }}<br>
                    <strong>Nomor Telepon:</strong> {{ $item->pembayaran->nomor_telepon }}<br>
                    <strong>Alamat Pengiriman:</strong> {{ $item->pembayaran->alamat_pengiriman }}<br>
                    <strong>Total Biaya:</strong> Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                </p>

                <ul>
                    @foreach ($item->detailPesanan as $detail)
                        <li>
                            {{ $detail->produk->nama }} - {{ $detail->jumlah }} pcs

                            @if ($item->pembayaran->status == 'disetujui' && $item->status_konfirmasi === 'selesai')
                                @if ($detail->ulasan)
                                    <br><strong>Ulasan:</strong> {{ $detail->ulasan->isi }}<br>
                                    <strong>Rating:</strong> 
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $detail->ulasan->rating)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                @else
                                    <br><a href="{{ route('ulasan.form', ['id' => $detail->id]) }}" class="btn btn-sm btn-primary mt-1">Beri Ulasan</a>
                                @endif
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @empty
        <p>Belum ada pesanan.</p>
    @endforelse
</div>
@endsection
