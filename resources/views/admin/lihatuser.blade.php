@extends('layouts.app')

@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
    <h5 class="mb-2 text-titlecase mb-4">Ini Tabel</h5>
    <a href="{{ route('admin.tambahuser') }}" class="btn btn-primary mb-3">
      <i class="fas fa-plus-circle me-1"></i> Tambah User
    </a>
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
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user as $us)
              <tr>
                <td>{{ $us->id }}</td>
                <td>{{ $us->name }}</td>
                <td>{{ $us->email }}</td>
                <td>{{ $us->password }}</td>
                <td>{{ $us->role }}</td>
                <td>{{ $us->alamat }}</td>
                <td>{{ $us->nomor_telepon }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <a href="{{ route('admin.edituser', $us->id) }}" class="btn btn-success btn-sm btn-icon-text me-3">
                      <i class="typcn typcn-edit btn-icon-prepend"></i> Edit
                    </a>
                    <form action="{{ route('admin.deleteuser', $us->id) }}" method="POST">
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
