@extends('layouts/main')

@section('title', 'Form Tambah Data Barang')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Form Tambah Data Barang</h1></center>

  <form method="post" action="/items">
  @csrf
  <div class="form-group">
    <label for="jenis_barang">jenis Barang</label>
    <input type="text" class="form-control @error('jenis_barang') is-invalid @enderror" id="jenis_barang" placeholder="Masukan jenis_barang" name="jenis_barang" value="{{ old('jenis_barang') }}">
    @error('jenis_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="merek_barang">Merek Barang</label>
    <input type="text" class="form-control @error('merek_barang') is-invalid @enderror" id="merek_barang" placeholder="Masukan merek_barang" name="merek_barang" value="{{ old('merek_barang') }}">
    @error('merek_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="jumlah_barang">Jumlah Barang</label>
    <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" placeholder="Masukan jumlah_barang" name="jumlah_barang" value="{{ old('jumlah_barang') }}">
    @error('jumlah_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="kondisi_barang">Kondisi Barang</label>
    <input type="text" class="form-control @error('kondisi_barang') is-invalid @enderror" id="kondisi_barang" placeholder="Masukan kondisi_barang" name="kondisi_barang" value="{{ old('kondisi_barang') }}">
    @error('kondisi_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Tambah Data!</button>
  <a href = "{{ url('/items') }}"><input type="button" class="btn btn-danger" value="Kembali"></a>
</form>

</div>
@endsection