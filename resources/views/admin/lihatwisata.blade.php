@extends('layouts.app')


@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Tabel Wisata</h5>
          
          
        </div>
      
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Lokasi</th>
                          <th>Gambar</th>
                          {{-- <th>Aksi</th> --}}
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($wisata as $ws)
                      <tr>
                          <td>{{ $ws->id }}</td>
                          <td>{{ $ws->nama }}</td>
                          <td>{{ $ws->deskripsi }}</td>
                          <td>
                              <a href="{{ $ws->lokasi }}" target="_blank" class="btn btn-link text-primary">Lihat Lokasi</a>
                          </td>
                          <td>
                            <img src="{{ asset('storage/' . $ws->gambar) }}" alt="Gambar Produk" width="150">

                          </td>
                          {{-- <td>
                              <div class="d-flex align-items-center">
                                  <a href="{{ route('kreator.editwisata', $ws->id) }}" class="btn btn-success btn-sm btn-icon-text me-3">
                                      <i class="typcn typcn-edit btn-icon-prepend"></i> Edit
                                  </a>
                                  <form action="{{ route('kreator.deletewisata', $ws->id) }}" method="POST">
                                      @csrf
                                      <button type="submit" class="btn btn-danger btn-sm">
                                          <i class="typcn typcn-trash btn-icon-prepend"></i> Delete
                                      </button>
                                  </form>
                              </div>
                          </td> --}}
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