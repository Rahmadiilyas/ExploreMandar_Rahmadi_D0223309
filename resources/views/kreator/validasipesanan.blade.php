@extends('layouts.app1')

@section('konten')
<div class="container mt-4">
    <h3>Daftar Pembayaran Menunggu Validasi</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pembeli</th>
                <th>Pesanan ID</th>
                <th>Nomor HP</th>
                <th>Alamat</th>
                <th>Bukti Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembayaran as $item)
                <tr>
                    <td>{{ $item->pesanan->user->name }}</td>
                    <td>{{ $item->pesanan_id }}</td>
                    <td>{{ $item->nomor_telepon }}</td>
                    <td>{{ $item->alamat_pengiriman }}</td>
                    <td>
                        @if($item->bukti_pembayaran)
                            <a href="{{ asset('storage/'.$item->bukti_pembayaran) }}" target="_blank">Lihat</a>
                        @else
                            Pesanan COD
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('kreator.validasi.proses', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Validasi</button>
                        </form>
                        <form action="{{ route('kreator.validasi.tolak', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menolak pembayaran ini?')">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
