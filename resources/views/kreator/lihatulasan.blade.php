@extends('layouts.app1')


@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Tabel Kategori</h5>
          
          
        </div>
      
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table">
                  <thead>
                    <tr>
                   <th>ID</th>
                      <th>Produk_id</th>
                      <th>User_id</th>
                      <th>Isi</th>
                      <th>Rating</th>
                      {{-- <th>verifikasi</th> --}}
          
                      

                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($ulasan as $ul)
                    <tr>
                        <td>{{ $ul->id }}</td>
                        <td>{{ $ul->produk_id }} - {{ $ul->produk->nama ?? 'produk tidak ditemukan' }}</td>
                        <td>{{ $ul->user_id }} - {{ $ul->user->name ?? 'user tidak ditemukan' }}</td>
                        <td>{{ $ul->isi }}</td>
                        <td>{{ $ul->rating }}</td>
                        {{-- <td>{{ $ul->verifikasi }}</td> --}}
                    </tr>
                @endforeach
                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      
      
  
     
  
  
    </div>
@endsection