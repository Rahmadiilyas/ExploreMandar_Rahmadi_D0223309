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
  
                    <form class="forms-sample" action="{{ route('kreator.updateproduk', $produk->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
                      <div class="form-group">
                          <label for="code">Nama</label>
                          <input type="text" class="form-control" id="code" placeholder="name" name="name" value="{{ $produk->nama }}">
                        </div>
                      <div class="form-group">
                        <label for="exampleInputName1">User_ID</label>
                        <input type="text" class="form-control" id="user_id" placeholder="user_id"  name="user_id" value="{{ $produk->user_id }}">
                      </div>
                      
                      <div class="form-group">
                        <label for="credits">harga</label>
                        <input type="number" class="form-control" id="harga" placeholder="harga" name="harga" value="{{ $produk->harga }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" placeholder="deskripsi" name="deskripsi" value="{{ $produk->deskripsi }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">Kategori_id</label>
                        <input type="alamat" class="form-control" id="kategori_id" placeholder="kategori_id" name="kategori_id" value="{{ $produk->kategori_id }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">Gambar</label>
                        <input type="file" class="form-control" id="gambar" placeholder="gambar" name="gambar" value="{{ $produk->gambar }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">Stok</label>
                        <input type="stok" class="form-control" id="stok" placeholder="stok" name="stok" value="{{ $produk->stok }}">
                      </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection