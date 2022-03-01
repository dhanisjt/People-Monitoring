@extends('dashboard.layouts.main')

@section('container')

<div class ="col-6">
<form method="POST" action="/dashboard/posts">
    @csrf
    <div class="form-group">
        <label>Nama Tempat</label>
        <input type="text" class="form-control" id="tempat" placeholder="Masukan nama tempat" name="tempat">
      </div>
      <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" id="tempat" placeholder="Masukan Username" name="username">
      </div>
      <div class="form-group">
        <label>Alamat Tempat Di Google maps</label>
        <input type="text" class="form-control" id="alamat" placeholder="Masukan alamat tempat di google maps" name="alamat">
      </div>
      <div class="form-group">
        <label>No. Telp</label>
        <input type="number" class="form-control" id="telepon" placeholder="Masukan nomor telepon" name="telepon">
      </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <div class="input-group mb-3">
            <select class="form-control" id="kategori" name="kategori">
              <option selected>Pilih kategori</option>
              <option value="Tempat-Ibadah">Tempat Ibadah</option>
              <option value="Tempat-Makan">Tempat Makan</option>
              <option value="Olahraga">Olahraga</option>
              <option value="Pendidikan">Pendidikan</option>
              <option value="Shop">Shop</option>
              <option value="Pelayanan-Publik">Pelayanan Publik</option>
            </select>
          </div>
      </div>
      <div class="form-group">
      <label>Kapasitas tempat</label>
        <input type="number" class="form-control" id="kapasitas" placeholder="Masukan kapasitas" name="kapasitas">
      </div>

    <button type="submit" class="btn btn-primary mt-3">Tambah </button>
    {{-- {{ method_field('PUT') }} --}}
  </form>
</div>
@endsection
