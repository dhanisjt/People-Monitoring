@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Posts </h1>
  </div>



  <h2>Laporan Pemantauan Jumlah Pengunjung</h2>

  <div class ="panel">
      <div id="chartPost"></div>
  </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Tanggal</th>
              <th scope="col">Total Pengunjung</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($results as $result )
            {{-- {{  dd($results); }} --}}
            <tr>
                <td>{{ $result["date"] }}</td>
                <td>{{ $result["total"] }}</td>
              </tr>
            @endforeach

            @if ($prevDate != "")
            <a href="{{  url()->current() }}?cond=prev&end_at={{ $prevDate }}">prev</a>
            @endif
            @if ($lastDate != "")
                <a href="{{  url()->current() }}?cond=next&start_at={{ $lastDate }}">next</a>
            @endif

            {{-- <a href="{{ url()->back() }}">prev</a> --}}

          </tbody>
        </table>
      </div>


@endsection

@section('footer')

<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
Highcharts.chart('chartPost', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Pemantauan Total Pengunjung'
    },

    xAxis: {
        categories: {!! json_encode($categories) !!} ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Pengunjung'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color: {series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} orang</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Total Pengunjung',
        data: {!! json_encode($data) !!}

    }]
});

</script>


@endsection
