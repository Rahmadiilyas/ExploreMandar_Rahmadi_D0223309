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
                    <h4 class="card-title">Form Tambah Produk </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
                    <form class="forms-sample" action="{{ route('kreator.simpanproduk') }}" method="POST" enctype="multipart/form-data">
                        @csrf
    
                      <div class="form-group">
                          <label for="code">Nama</label>
                          <input type="text" class="form-control" id="code" placeholder="nama" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($user as $us)
                                    <option value="{{ $us->id }}">{{ $us->name }}</option>
                                @endforeach
                            </select>
                        </div>
                      
                      <div class="form-group">
                        <label for="credits">Harga</label>
                        <input type="number" class="form-control" id="harga" placeholder="harga" name="harga">
                      </div>
                      <div class="form-group">
                        <label for="credits">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="deskripsi" name="deskripsi">
                      </div>
                      <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-control" id="kategori_id" name="kategori_id">
                            @foreach($kategori as $kg)
                                <option value="{{ $kg->id }}">{{ $kg->nama }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="credits">Gambar</label>
                        <input type="file" class="form-control" id="gambar" placeholder="gambar" name="gambar">
                      </div>
                      <div class="form-group">
                        <label for="credits">Stok</label>
                        <input type="number" class="form-control" id="stok" placeholder="stok" name="stok">
                      </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection