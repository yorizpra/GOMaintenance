@extends('layouts/dsn')

@section('title', 'Form Pinjam Barang')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Form Pinjam Barang</h1></center>

  <form method="post" action="/pinjambarangdsn">
  @csrf
  <div class="form-group">
    <label for="id_dosen"></label>
    @foreach($datas as $data)
    <input type="hidden" class="form-control @error('id_dosen') is-invalid @enderror" id="id_dosen" placeholder="" name="id_dosen" value="{{Session::get('id_dosen')}}">
    @endforeach
    @error('id_dosen')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <!-- <div class="form-group">
    <label for="id_ruangan">ID Ruangan</label>
    @foreach($barang as $room)
    <input type="text" class="form-control @error('id_ruangan') is-invalid @enderror" id="id_ruangan" placeholder="" name="id_ruangan" value="{{$room->id_dosen}}">
    @endforeach
    @error('id_ruangan')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div> -->
  <div class="form-group">
    <label for="nama">Nama Dosen</label>
    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="" name="nama" value="{{Session::get('nama')}}">
    @error('nama')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group row">
    <label for="id_barang" class="col-sm-2 col-form-label">Pilih Barang</label>
      <div class="col-sm-5">
        <select name="id_barang" id="id_barang" class="form-control">
          <option value="">== Pilih Barang yang ingin anda pinjam ==</option>
            @foreach ($barang as $item)
              <option value="{{ $item->id_barang }}">{{ $item->jenis_barang }}</option>
            @endforeach
        </select>
      </div>
  </div>
  <div class="form-group">
    <label for="jumlah_pinjam">Jumlah Pinjam</label>
    <input type="text" class="form-control @error('jumlah_pinjam') is-invalid @enderror" id="jumlah_pinjam" placeholder="" name="jumlah_pinjam" value="{{ old('jumlah_pinjam') }}">
    @error('jumlah_pinjam')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="tgl_pinjam">Tanggal Pinjam</label>
    <input type="date" class="form-control @error('tgl_pinjam') is-invalid @enderror" id="tgl_pinjam" placeholder="" name="tgl_pinjam" value="{{ old('tgl_pinjam') }}">
    @error('tgl_pinjam')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="tgl_kembali">Tanggal Kembali</label>
    <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" placeholder="" name="tgl_kembali" value="{{ old('tgl_kembali') }}">
    @error('tgl_kembali')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="status"></label>
    <input type="hidden" class="form-control @error('status') is-invalid @enderror" id="status" placeholder="" name="status" value="pinjam">
    @error('status')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label for="ket">Keterangan</label>
    <input type="text" class="form-control @error('ket') is-invalid @enderror" id="ket" placeholder="" name="ket" value="{{ old('ket') }}">
    @error('ket')
      <div class="invalid-feedback">
        {{$message}}
      </div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Tambah Data!</button>
</form>

</div>
@endsection