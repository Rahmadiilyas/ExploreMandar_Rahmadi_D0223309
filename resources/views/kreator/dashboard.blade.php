@extends('layouts.app1')
@section('konten')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Explore Mandar</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
            <i class="fas fa-map-marked-alt fa-sm text-white-50"></i> Jelajahi Sekarang
        </a>
    </div>

    <div class="row">
        <!-- Kuliner Khas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Kuliner Khas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">30+ Menu</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-utensils fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wisata -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Wisata Alam & Budaya</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">15 Lokasi</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tree fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Mandar -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Event Terbaru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3 Bulan Ini</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- UMKM -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                UMKM Mandar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">12 Terdaftar</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-store fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Chart -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Sumber Pengunjung</h6>
                </div>
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2"><i class="fas fa-circle text-primary"></i> Lokal</span>
                        <span class="mr-2"><i class="fas fa-circle text-success"></i> Nasional</span>
                        <span class="mr-2"><i class="fas fa-circle text-info"></i> Mancanegara</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Info & Ilustrasi -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <!-- Project Card -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Progres Digitalisasi Mandar</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Pemetaan Wisata <span class="float-right">40%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 40%"></div>
                    </div>
                    <h4 class="small font-weight-bold">Katalog Kuliner <span class="float-right">70%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 70%"></div>
                    </div>
                    <h4 class="small font-weight-bold">UMKM Terdata <span class="float-right">85%</span></h4>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 85%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ilustrasi -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ilustrasi Budaya</h6>
                </div>
                <div class="card-body text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="{{ asset('assets/img/sayyang-pattudu.jpg') }}" alt="Ilustrasi Mandar">
                    <p>Ilustrasi budaya dan keindahan Mandar yang menggambarkan tradisi, makanan khas, dan potensi daerah.</p>
                    <a target="_blank" href="https://undraw.co/">Lihat Koleksi Ilustrasi &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
