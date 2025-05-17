@extends('master1')

@section('konten')
<div class="container py-5">
    <h3 class="text-center mb-4">Profil Saya</h3>

    <div class="card shadow-lg">
        <div class="card-body">
            <!-- Profile Details -->
            <div class="mb-3">
                <p><strong>Nama:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ $user->role }}</p>
            </div>

            <!-- Update Profile Button -->
            <div class="text-center">
                <a href="{{ route('profile.edit1') }}" class="btn btn-primary btn-lg">Update Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection
