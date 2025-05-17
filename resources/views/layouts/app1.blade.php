<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Explore Mandar - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sb-admin/sb-admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sb-admin/sb-admin') }}/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom CSS: fix sidebar, topbar, and keep header/profile static -->
    <style>
        /* Sidebar fixed */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            overflow-y: auto;
            z-index: 1030;
        }
        /* Topbar fixed next to sidebar */
        .topbar {
            position: fixed;
            top: 0;
            left: 250px;
            width: calc(100% - 250px);
            z-index: 1020;
        }
        /* Content wrapper margin to avoid sidebar */
        #content-wrapper {
            margin-left: 250px;
            width: calc(100% - 250px);
        }
        /* Add top padding for fixed topbar */
        #content {
            padding-top: 70px; /* adjust to topbar height */
        }
        /* Ensure page wrapper uses flex */
        #wrapper {
            display: flex;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Explore Mandar </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('kreator.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Interface</div>
            <!-- User Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#userMenu" aria-expanded="true" aria-controls="userMenu">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Kategori</span>
                </a>
                <div id="userMenu" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akses:</h6>
                        <a class="collapse-item" href="{{ route('kreator.tambahkategori') }}">Tambah Kategori</a>
                        <a class="collapse-item" href="{{ route('kreator.lihatkategori') }}">Lihat Kategori</a>
                    </div>
                </div>
            </li>
            <!-- Kategori -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kategoriMenu" aria-expanded="true" aria-controls="kategoriMenu">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Produk</span>
                </a>
                <div id="kategoriMenu" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akses:</h6>
                        <a class="collapse-item" href="{{ route('kreator.tambahproduk') }}">Tambah Produk</a>
                        <a class="collapse-item" href="{{ route('kreator.lihatproduk') }}">Lihat Produk</a>
                    </div>
                </div>
            </li>
            <!-- Produk -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produkMenu" aria-expanded="true" aria-controls="produkMenu">
                    <i class="fas fa-fw fa-box-open"></i>
                    <span>Pesanan</span>
                </a>
                <div id="produkMenu" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akses:</h6>
                        <a class="collapse-item" href="{{ route('kreator.lihatpesanan') }}">Lihat Pesanan</a>
                    </div>
                </div>
            </li>
            <!-- Pesanan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pesananMenu" aria-expanded="true" aria-controls="pesananMenu">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Wisata</span>
                </a>
                <div id="pesananMenu" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akses:</h6>
                        <a class="collapse-item" href="{{ route('kreator.tambahwisata') }}">Tambah Wisata</a>
                        <a class="collapse-item" href="{{ route('kreator.lihatwisata') }}">Lihat Wisata</a>
                    </div>
                </div>
            </li>
            <!-- Pembayaran -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pembayaranMenu" aria-expanded="true" aria-controls="pembayaranMenu">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Validasi Pembayaran</span>
                </a>
                <div id="pembayaranMenu" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akses:</h6>
                        <a class="collapse-item" href="{{ route('kreator.validasi.index') }}">Validasi Pembayaran</a>
                    </div>
                </div>
            </li>

            <!--ulasan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ulasanMenu" aria-expanded="true" aria-controls="pembayaranMenu">
                    <i class="fas fa-fw fa-money-check-alt"></i>
                    <span>Ulasan</span>
                </a>
                <div id="ulasanMenu" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Akses:</h6>
                        <a class="collapse-item" href="{{ route('kreator.lihatulasan') }}">Lihat Ulasan</a>
                    </div>
                </div>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
  
   
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ asset('sb-admin/sb-admin/img/undraw_profile.svg') }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href={{ route('profile.edit') }}><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile Update</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Settings</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>Activity Log</a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">@csrf<button class="dropdown-item"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</button></form>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('konten')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"><div class="modal-content">
            <div class="modal-header"><h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5><button class="close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button><a class="btn btn-primary" href="#">Logout</a></div>
        </div></div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sb-admin/sb-admin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('sb-admin/sb-admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sb-admin/sb-admin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sb-admin/sb-admin') }}/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('sb-admin/sb-admin') }}/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sb-admin/sb-admin') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('sb-admin/sb-admin') }}/js/demo/chart-pie-demo.js"></script>

</body>
</html>
