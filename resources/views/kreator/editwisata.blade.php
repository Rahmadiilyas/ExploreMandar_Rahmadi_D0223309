@extends('layouts.app1')


@section('konten')
<div class="content-wrapper">

    <div class="col-xl-6 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">Tambah Produk</h5>
            
            
          </div>
        
          <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Tambah Wisata </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
                    <form class="forms-sample" action="{{ route('kreator.updatewisata', $wisata->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
    
                      <div class="form-group">
                          <label for="code">Nama</label>
                          <input type="text" class="form-control" id="code" placeholder="nama" name="nama" value="{{ $wisata->nama }}">
                        </div>
                    
                      
                      <div class="form-group">
                        <label for="credits">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="deskripsi" name="deskripsi" value="{{ $wisata->deskripsi }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" placeholder="lokasi" name="lokasi" value="{{ $wisata->lokasi }}">
                      </div>

                      <div class="form-group">
                        <label for="credits">Gambar</label>
                        <input type="file" class="form-control" id="gambar" placeholder="gambar" name="gambar" value="{{ $wisata->gambar }}">
                      </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection