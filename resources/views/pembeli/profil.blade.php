@extends('master1')

@section('konten')
<div class="container py-5">
  <h3>Profil Saya</h3>
  <div class="card">
    <div class="card-body">
      <p><strong>Nama:</strong> {{ $user->name }}</p>
      <p><strong>Email:</strong> {{ $user->email }}</p>
      <p><strong>Role:</strong> {{ $user->role }}</p>
    </div>
  </div>
</div>
@endsection
