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
                      <th>Nama</th>
                      
                      {{-- <th>Actions</th> --}}
                    </tr>
                  </thead>
                  <tbody>


                    @foreach ($kategori as $kg)
                
                    <tr>
                        <td>{{ $kg->id }}</td>
                      <td>{{ $kg->nama }}</td>

                        
                     
          

                    
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