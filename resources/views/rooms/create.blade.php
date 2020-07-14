@extends('layouts/main')

@section('title', 'Form Tambah Data Ruangan')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Form Tambah Data Ruangan</h1></center>

  <form method="post" action="/rooms">
  @csrf
  <div class="form-group">
    <label for="nama_ruangan">Nama Ruangan</label>
    <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan" placeholder="Masukan nama_ruangan" name="nama_ruangan" value="{{ old('nama_ruangan') }}">
    @error('nama_ruangan')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Tambah Data!</button>
  <a href = "{{ url('/rooms') }}"><input type="button" class="btn btn-danger" value="Kembali"></a>
</form>

</div>
@endsection