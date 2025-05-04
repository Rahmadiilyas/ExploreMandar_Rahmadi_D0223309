@extends('layouts.app')


@section('konten')

<div class="content-wrapper">

  <div class="col-xl-6 grid-margin stretch-card flex-column">
            <h5 class="mb-2 text-titlecase mb-4">Tabel Kategori</h5>
          
          
        </div>
      
      <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table">
                  <thead>
                    <tr>
                   <th>ID</th>
                      <th>Nama User</th>
                      <th>Nama Produk</th>
                      <th>Jumlah</th>
                      <th>Total_harga</th>
                      <th>Status</th>
                      <th>Status_Pembayaran</th>
                      
                      {{-- <th>Actions</th> --}}
                    </tr>
                  </thead>
                  <tbody>


                    @foreach ($pesanan as $ps)
                
                    <tr>
                        <td>{{ $ps->id }}</td>
                      <td>{{ $ps->users->name ?? '_' }}</td>
                      <td>{{ $ps->produk->nama ?? '_' }}</td>

                      <td>{{ $ps->jumlah }}</td>
                      <td>{{ $ps->detailpesanan->sum('sub_total') }}</td>
                      <td>{{ $ps->status }}</td>
                      <td>{{ $ps->status_pembayaran }}</td>
                     

                        
                     
          

                    
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