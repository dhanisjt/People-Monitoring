@extends ('app')

@section('content')


    <!-- Content Row -->

@foreach ($result as $tempat)


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
                      <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> {{ $tempat['orang_masuk'] }}</div>
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
                    <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> {{$tempat['orang_keluar']}}</div>
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
                    <div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> {{$tempat['total_orang']}}</div>
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

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyAADsSA0U-I-17VfUsaUiWk50LM2LBQgYQ",
  authDomain: "projekgeden-4a044.firebaseapp.com",
  databaseURL: "https://projekgeden-4a044-default-rtdb.firebaseio.com",
  projectId: "projekgeden-4a044",
  storageBucket: "projekgeden-4a044.appspot.com",
  messagingSenderId: "681974849259",
  appId: "1:681974849259:web:e06c528ccb66d3fbf6a8ae"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

</script>


 <script>
     $(document).ready(function(){

         semuaData();

         function semuaData(){
             $.ajax({
                 url : 'https://projekgeden-4a044-default-rtdb.firebaseio.com/',
                success : function(jumlah){
                     try{
                         var json = jumlah;
                         var masuk = jumlah.orangmasuk;
                         var keluar = jumlah.orangkeluar;
                         var totalorang = jumlah.totalorang;

                        alert(masuk);


                     }catch{
                         alert('Errorr');
                     }
                 }
             });
         }
    });

</script>

@endforeach


@endsection
