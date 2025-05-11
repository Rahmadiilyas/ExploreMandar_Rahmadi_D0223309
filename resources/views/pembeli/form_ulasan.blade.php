@extends('master1')

@section('konten')
<div class="container">
    <h4>Beri Ulasan untuk {{ $detail->produk->nama }}</h4>
    <form action="{{ route('ulasan.simpan') }}" method="POST">
        @csrf
        <input type="hidden" name="detail_pesanan_id" value="{{ $detail->id }}">

        <div class="mb-3">
            <label for="isi_ulasan" class="form-label">Ulasan</label>
            <textarea name="isi_ulasan" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1–5)</label>
            <select name="rating" class="form-select" required>
                <option value="" disabled selected>Pilih rating</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Bintang</option>
                @endfor
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
    </form>
</div>
@endsection
