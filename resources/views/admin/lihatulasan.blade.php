@extends('layouts.app')

@section('konten')
<div class="content-wrapper">
  <div class="card">
    <div class="card-header"><h4>Data Ulasan Produk</h4></div>
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Produk</th>
            <th>User</th>
            <th>Rating</th>
            <th>Isi</th>
            <th>Verifikasi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($ulasan as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td>{{ $u->produk->nama ?? '-' }}</td>
              <td>{{ $u->user->name ?? '-' }}</td>
              <td>{{ $u->rating }}/5</td>
              <td>{{ $u->isi }}</td>
              <td>
                <span class="badge bg-{{ $u->verifikasi ? 'success' : 'secondary' }}">
                  {{ $u->verifikasi ? 'Sudah' : 'Belum' }}
                </span>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="text-center">Belum ada ulasan</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
