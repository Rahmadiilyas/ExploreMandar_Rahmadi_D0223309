@extends('layouts.app')


@section('konten')
<div class="content-wrapper">

    <div class="col-xl-6 grid-margin stretch-card flex-column">
              <h5 class="mb-2 text-titlecase mb-4">Tambah User</h5>
            
            
          </div>
        
          <div class="row">
              
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Form Tambah User </h4>
                    <p class="card-description">
                      Basic form elements
                    </p>
  
                    <form class="forms-sample" action="{{ route('admin.updateuser', $user->id) }}" method="POST">
                    @csrf
    
                      <div class="form-group">
                          <label for="code">Nama</label>
                          <input type="text" class="form-control" id="code" placeholder="name" name="name" value="{{ $user->id }}">
                        </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email"  name="email" value="{{ $user->email }}">
                      </div>
                      
                      <div class="form-group">
                        <label for="credits">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="password" name="password" value="{{ $user->password }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">Role</label>
                        <input type="role" class="form-control" id="role" placeholder="role" name="role" value="{{ $user->role }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">Alamat</label>
                        <input type="alamat" class="form-control" id="alamat" placeholder="alamat" name="alamat" value="{{ $user->alamat }}">
                      </div>
                      <div class="form-group">
                        <label for="credits">No_Telepon</label>
                        <input type="nomor_telepon" class="form-control" id="nomor_telepon" placeholder="nomor_telepon" name="nomor_telepon" value="{{ $user->nomor_telepon }}">
                      </div>

                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
              
              
        
            </div>
@endsection