@extends('dashboard.layouts.main')

@section('container')

<form action="/dashboard/kategori/update" method="POST">
@csrf
    <div class="form-group">
      <label>Nama</label>
      <input type="text" value="{{ $tempat->nama }}" name="nama" class="form-control" placeholder="Enter name">
      <small class="form-text text-muted">Update new name</small>
    </div>
    <input type="hidden" value="{{ $tempat->id }}" name="id">
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection
