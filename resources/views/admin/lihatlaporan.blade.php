@extends('layouts.app')


@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Tabel Pesanan</h5>
          
          
        </div>
      
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table">
                  <thead>
                    <tr>
                        <tr>
                            <th>ID</th>
                            <th>Pesanan</th>
                            <th>Nama Penerima</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status</th>
                          
                        </tr>
                      {{-- <th>Actions</th> --}}
                    </tr>
                  </thead>
                  <tbody>

                    @forelse($pembayaran as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>#{{ $item->pesanan_id }} - {{ $item->pesanan->user->name ?? '-' }}</td>
                        <td>{{ $item->nama_penerima }}</td>
                        <td>{{ $item->alamat_pengiriman }}</td>
                        <td>{{ $item->nomor_telepon }}</td>
                        <td>
                            @if($item->bukti_pembayaran)
                                <a href="{{ asset('storage/' . $item->bukti_pembayaran) }}" target="_blank">Lihat</a>
                            @else
                                Tidak ada
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ $item->status == 'disetujui' ? 'success' : ($item->status == 'ditolak' ? 'danger' : 'warning') }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                     
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada pembayaran</td>
                    </tr>
                    @endforelse
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
      
  
     
  
  
    </div>
@endsection