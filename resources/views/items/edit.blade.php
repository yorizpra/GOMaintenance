@extends('layouts/main')

@section('title', 'Form Ubah Data Barang')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Form Ubah Data Barang</h1></center>

  <form method="post" action="Edit/{{ $item->id_barang }}">
  @method('patch')
  @csrf
  <div class="form-group">
    <label for="jenis_barang">Jenis Barang</label>
    <input type="text" class="form-control @error('jenis_barang') is-invalid @enderror" id="jenis_barang" placeholder="Masukan jenis_barang" name="jenis_barang" value="{{ $item->jenis_barang }}">
    @error('jenis_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="merek_barang">Merek Barang</label>
    <input type="text" class="form-control @error('merek_barang') is-invalid @enderror" id="merek_barang" placeholder="Masukan merek_barang" name="merek_barang" value="{{ $item->merek_barang }}">
    @error('merek_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="jumlah_barang">Jumlah Barang</label>
    <input type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" id="jumlah_barang" placeholder="Masukan jumlah_barang" name="jumlah_barang" value="{{ $item->jumlah_barang }}">
    @error('jumlah_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="kondisi_barang">Kondisi Barang</label>
    <input type="text" class="form-control @error('kondisi_barang') is-invalid @enderror" id="kondisi_barang" placeholder="Masukan kondisi_barang" name="kondisi_barang" value="{{ $item->kondisi_barang }}">
    @error('kondisi_barang')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Ubah Data!</button>
  <a href = "{{ url('/items') }}"><input type="button" class="btn btn-danger" value="Kembali"></a>
</form>

</div>
@endsection