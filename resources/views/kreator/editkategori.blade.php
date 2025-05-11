@extends('layouts.app1')


@section('konten')
<div class="content-wrapper">

    <div class="col-xl-6 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">Edit Kategori</h5>
            
            
          </div>
        
          <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Edit Kategori </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
                    <form class="forms-sample" action="{{ route('kreator.updatekategori', $kategori->id) }}" method="POST">
                    @csrf
    
                      <div class="form-group">
                          <label for="code">Nama</label>
                          <input type="text" class="form-control" id="code" placeholder="name" name="nama" value="{{ $kategori->nama }}">
                      </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection