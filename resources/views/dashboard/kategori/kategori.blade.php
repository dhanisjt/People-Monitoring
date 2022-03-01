@extends('dashboard.layouts.main')

@section('container')


{{-- @if (count($tempats) == 0)
    <div>
        <a href="{{ URL::previous() }}">Kembali</a>
        <br>
        <p>Ups maaf, belum ada datanya pak</p>
    </div>
@endif --}}

@foreach ($tempats as $tempat)


<div class = "text-md font-weight-bold text-primary text-uppercase mb-3 mt-5 d-flex">{{ $tempat['name'] }}

    @if($tempat["user_id"]==$id||$is_admin)

    <a target="blank"class= "btn btn-warning" href="/dashboard/posts/cetak/{{ $tempat["id"] }}"><span data-feather="printer"></span> Cetak Laporan</a>

    <a class="btn btn-info" href="/dashboard/posts/{{ $tempat["id"] }}"><span data-feather="eye"></span> Lihat Laporan </a>

    <a class="btn btn-warning" href="/dashboard/kategori/update/{{ $tempat["id"] }}"><span data-feather="edit"></span> Ubah Nama </a>
    @endif

    @if($is_admin)
    <form action="/dashboard/kategori/delete" method="post">
        @csrf
        <input type="hidden" value="{{ $tempat["id"] }}" name="id">
        <button type="submit" class="btn btn-danger">
            <span data-feather="trash-2"></span> Hapus Tempat
    </button>
    </form>
    @endif

</div>

<div class="row">

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
                         Orang Masuk</div>
                      <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> {{ $tempat['totalmasuk'] }}</div>
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

    {{-- <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Total Orang Masuk</div>
                        <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> 15 </div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div> --}}


    <!-- Pie Chart -->
    <div class="col-xl-9 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="m-0 font-weight-bold text-primary">Kapasitas</div>
                <div class="dropdown no-arrow">
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <!-- <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div> -->

                {{-- <div class="w3-border">
                    @if ($tempat["kapasitas"] == "Senggang")
                        <div id="bar" class="w3-green" style="height:24px;width:30%"></div>
                    @elseif ($tempat["kapasitas"] == "Hampir Penuh")
                        <div id="bar" class="w3-orange" style="height:24px;width:60%"></div>
                    @elseif ($tempat["kapasitas"] == "Penuh")
                        <div id="bar" class="w3-red" style="height:24px;width:100%"></div>
                    @endif
                  </div> --}}


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

    <a class="btn btn-success mt-4  " target="blank" href="{{$tempat["alamat"]}}">Lihat Lokasi </a>
</div>
    </div>


@endforeach


@endsection
