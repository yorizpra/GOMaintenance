@extends('layouts/main')

@section('title', 'Form Ubah Data Dosen')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Form Ubah Data Dosen</h1></center>

  <form method="post" action="Edit/{{ $lecturer->id_dosen }}">
  @method('patch')
  @csrf
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama" name="nama" value="{{ $lecturer->nama }}">
    @error('nama')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="jenis_kelamin">Jenis Kelamin</label>
    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin">
      <option selected disabled value="">Pilih Jenis Kelamin</option>
      <option value="Laki-laki"  {{ old('jenis_kelamin') == 1 ? 'selected' : '' }}>Laki-laki</option>
      <option value="Perempuan"  {{ old('jenis_kelamin') == 2 ? 'selected' : '' }}>Perempuan</option>
    </select>
    @error('jenis_kelamin')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <!-- <form method="post" action="/users/create"> -->
  <div class="form-group">
  <label for="no_telepon">Nomor Telepon</label>
  <input type="number" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" placeholder="Masukan Nomor Telepon" name="no_telepon" value="{{ $lecturer->no_telepon }}">
    @error('no_telepon')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" rows="3" name="alamat">{{ $lecturer->alamat }}</textarea>
    @error('alamat')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Ubah Data!</button>
  <a href = "{{ url('/lecturers') }}"><input type="button" class="btn btn-danger" value="Kembali"></a>
</form>

</div>
@endsection