
@extends('layouts.app1')


@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Pesanan Masuk</h5>
        </div>
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table">
                  <thead>
                    <tr>
                   <th>Pesanan ID</th>
                   <th>Produk</th>
                   <th>Jumlah</th>
                   <th>Subtotal</th>
                   <th>Pembeli</th>
                   <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detail_pesanan as $detail)
                   
    <tr>
        <td>{{ $detail->pesanan->id }}</td>
        <td>{{ $detail->produk->nama }}</td>
        <td>{{ $detail->jumlah }}</td>
        <td>{{ $detail->sub_total }}</td>
        <td>{{ $detail->pesanan->user->name ?? '-' }}</td>
        <td>{{ $detail->pesanan->status }}</td>
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