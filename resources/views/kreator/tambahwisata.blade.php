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
  
                    <form class="forms-sample" action="{{ route('kreator.simpanwisata') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="code">Nama</label>
                          <input type="text" class="form-control" id="code" placeholder="nama" name="nama">
                      </div>
                      <div class="form-group">
                          <label for="credits">Deskripsi</label>
                          <input type="text" class="form-control" id="deskripsi" placeholder="deskripsi" name="deskripsi">
                      </div>
                      <div class="form-group">
                          <label for="lokasi">Link Lokasi (Google Maps)</label>
                          <input type="url" class="form-control" id="lokasi" placeholder="https://maps.google.com/..." name="lokasi">
                      </div>
                      <div class="form-group">
                          <label for="credits">Gambar</label>
                          <input type="file" class="form-control" id="gambar" placeholder="gambar" name="gambar">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                  </form>
                  
                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection