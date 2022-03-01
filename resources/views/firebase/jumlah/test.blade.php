@extends ('app')


@section('content')

@foreach ($tampil as $jum => $orang)
<div class="col mr-2">
<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         Total Orang Masuk</div>
<div id="TotalPengunjung" class="h5 mb-0 font-weight-bold text-gray-800"> {{$orang['orang_masuk']}}</div>
</div>
@endforeach


@endsection
