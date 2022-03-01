@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> Hallo {{ auth()->user()->nama }}</h1>
  </div>

  {{-- <h1 class="h2">Welcome Back, {{ auth()->user()->name }}  </h1> --}}
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
         {{session('success')}}
        </div>
    @endif

  <div class="container-fluid">
        @if($is_admin)
      <a href="/dashboard/posts/create" class= "btn btn-success mb-3"><span data-feather="plus"></span> Tambah Tempat </a>

        @endif
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-primary">Daftar Tempat Pemantauan Jumlah Orang</h1>

    </div>

     <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <a href="/kategori/Tempat-Ibadah">Tempat Ibadah</a>
                            <img class="img-profile rounded-circle" src="tempatibadah.jpg" width = "50">
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
                            <a href="/kategori/Tempat-Makan">Tempat Makan</a>
                            <img class="img-profile rounded-circle" src="tempatmakan.jpg" width = "50">
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
                            <a href="/kategori/Olahraga">Olahraga</a>
                            <img class="img-profile " src="olahraga.png" width = "30">
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
                            <a href="/kategori/Shop">Shop</a>
                            <img class="img-profile " src="shop.png" width = "30">
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
                            <a href="/kategori/Pelayanan-Publik">Pelayanan Publik</a>
                            <img class="img-profile " src="pelayanan.png" width = "30">
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
                               <a href="/kategori/Pendidikan">Pendidikan
                               <img class="img-profile rounded-circle " src="pendidikan.jpg" width = "40">
                               </div>
                            </div>
                            <div class="col-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
