<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Cetak Laporan Pengunjung</title>
    <link rel="stylesheet" href={{ asset('style.css') }} media="all" />
  </head>
  <body>
    <header class="clearfix">
<br><br>
      <h1>Laporan Pemantauan Jumlah Pengunjung</h1>

      <div id="project">
        <div><span>Nama Tempat</span>{{ $lokasi->nama }}</div>
		<div><span>No.Hp</span> {{ $lokasi->telepon }}</div>
        <div><span>Email</span> <a href="mailto:{{ $lokasi->email }}">{{ $lokasi->email }}</a></div>
      </div>
    </header>
    <main>
     <table class="table">
  <thead>
    <tr>
      <th scope="col">Tanggal</th>
      <th scope="col">Jumlah Pengunjung</th>
    </tr>
  </thead>
  <tbody>

    @foreach ( $histories as $history )
    <tr>
        <th scope="row">{{ $history["date"] }}</th>
       <th scope="row">{{ $history["total"] }} Orang</th>
     </tr>
    @endforeach

  </tbody>
  </table>
    </main>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; People Monitoring IoT</span>
            </div>
		</div>
    </footer>


    <script type="text/javascript">
        window.print();
    </script>

  </body>
</html>

