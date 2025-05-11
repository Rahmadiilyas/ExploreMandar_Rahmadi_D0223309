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
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Deskripsi</th>
                      <th>Nama Kategori</th>
                      <th>Gambar</th>
                      <th>Stok</th>
                      
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>


                    @foreach ($produk as $pr)
                
                    <tr>
                        <td>{{ $pr->id }}</td>
                      <td>{{ $pr->nama }}</td>
                      <td>{{ $pr->harga }}</td>

                      <td>{{ $pr->deskripsi }}</td>
                      <td>{{ $pr->kategori->nama ?? '_' }}</td>
                      <td>
                        <img src="{{ asset('storage/' . $pr->gambar) }}" alt="Gambar Produk" width="150">
                    </td>
                      <td>{{ $pr->stok }}</td>
                     <td>
                      <div class="d-flex align-items-center">
                        <a href="{{ route('kreator.editproduk', $pr->id) }}" class="btn btn-success btn-sm btn-icon-text me-3">
                          <i class="typcn typcn-edit btn-icon-prepend"></i> Edit
                        </a>
                        <form action="{{ route('kreator.deleteproduk', $pr->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm">
                            <i class="typcn typcn-trash btn-icon-prepend"></i> Delete
                          </button>
                        </form>
                      </div>
                        
                     
                    </td>

                    
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