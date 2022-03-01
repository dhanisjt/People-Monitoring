<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>People monitoring</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="{{asset("sb-admin-2.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-warning sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">People Detector<sup>IoT</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span> </span></a>
            </li>

            <!-- Divider -->
            {{-- <hr class="sidebar-divider"> --}}


            <!-- Sidebar Toggler (Sidebar) -->
            {{-- <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div> --}}


        </ul>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">

                    @auth

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome back, {{ auth()->user()->name }}</span>
                            <img class="img-profile rounded-circle"
                                src="logoprofil.svg">
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                            <form action= "/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>Logout</button>
                            </form>
                            </li>
                        </ul>
                    </li>

                    @else

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="/login" class="nav-link">Login</a>
                        </li>
                    </ul>

                    @endauth


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                    </ul>

                </ul>

                </nav>

                {{-- <br>
                <div style = "  margin: auto;
                                width: 60%;
                                padding: 10px;">
                <a href="/login" class="btn btn-primary btn-user btn-block"> Login </a>

                </div> --}}

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="text-center d-none d-md-inline" >

                        <a type="button" href="{{ URL::previous()  }}" class="btn btn-danger rounded-circle" id="sidebarToggle"
                        style="width: 60px; height: 40px">back</a>
                    </div>

                    <!-- Page Heading -->


                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-primary">Kategori</h1>

                    </div>

                </div>
                <!-- /.container-fluid -->

                {{-- this this this --}}

                <div class="container-fluid">
                @foreach ($tempats as $tempat)
                    <!-- Earnings (Monthly) Card Example -->

                    <div class = "text-md font-weight-bold text-primary text-uppercase mb-2"> {{ $tempat['name'] }}</div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Orang Masuk
                                            </div>
                                            <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800">
                                                {{ $tempat['totalmasuk'] }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Orang Keluar</div>
                                            <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> {{$tempat['totalkeluar']}}</div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Orang Didalam ruangan</div>
                                            <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> {{$tempat['totalorang']}}</div>
                                        </div>
                                        <div class="col-auto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <!-- Pie Chart -->
                        <div class="col-xl-9 col-lg-5">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class="m-0 font-weight-bold text-primary">Kapasitas</div>
                                    <div class="dropdown no-arrow"></div>
                                </div>

                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="w3-border">
                                        @if ($tempat["kapasitas"] == "Senggang")
                                            <div id="bar" class="w3-green" style="height:24px;width:30%"></div>
                                        @elseif ($tempat["kapasitas"] == "Hampir Penuh")
                                            <div id="bar" class="w3-orange" style="height:24px;width:60%"></div>
                                        @elseif ($tempat["kapasitas"] == "Penuh")
                                            <div id="bar" class="w3-red" style="height:24px;width:100%"></div>
                                        @endif
                                      </div>

                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fa fa-circle text-success"></i> Senggang
                                        </span>
                                        <span class="mr-2">
                                            <i class="fa fa-circle text-warning"></i> Hampir Penuh
                                        </span>
                                        <span class="mr-2">
                                            <i class="fa fa-circle text-danger"></i> Penuh
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <a class="btn btn-success mb-5 " target="blank" href="{{$tempat["alamat"]}}">Lihat Lokasi </a>

                    @endforeach
                </div>
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; People Monitoring IoT</span>
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

    {{-- <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/login">Logout</a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>



    <script>
        let senggang = 10
        let hampirPenuh = 40
        let penuh = 50
        let color, width

        // <<---- jukuk firebise

        // if total <= senggang {
        //     color = "w3-blue"
        //     width = 30
        // }
        // if total <= hampirPenuh {
        //     olor = "w3-blue"
        //     width = 30
        // }

        // if total == penuh {
        //     olor = "w3-blue"
        //     width = 300%
        // }

        // <--
        // document.getElementById("bar").className = color;
        // document.getElementById("bar").style.width = width+"%";
        // document.getElementById("TotalPengunjung").innerHTML =

    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</body>

</html>
