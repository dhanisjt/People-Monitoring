@extends('app')


@section('content')

      <!-- Content Row -->
<?php

$tempats = [
    "Universitas Amikom Yogyakarta",
    "Revia Makeup Course",
    "Menara TC (Kursus Komputer Jogja)"
];
foreach ($tempats as $tempat) {

?>

<div class = "text-md font-weight-bold text-primary text-uppercase mb-1"> <?php echo $tempat;?></div>
<div class="row">

<!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                           Total Orang Masuk</div>
                        <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800">1500</div>
                    </div>
                    <div class="col-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kapasitas
                </h6>
                <div class="dropdown no-arrow">


                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!-- <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div> -->
                <div class="w3-border">
                    <div id="bar" class="w3-green" style="height:24px;width:30%"></div>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Senggang
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Hampir Penuh
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Penuh
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>

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

<?php
}
?>

@endsection
