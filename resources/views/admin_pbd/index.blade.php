@extends('layouts/main')

@section('title', 'Pinjam Barang')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Daftar Peminjaman Barang Yang Dilakukan Oleh Dosen</h1></center>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID Peminjaman</th>
            <th scope="col">Nama Dosen</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Status</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $datas as $data )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->id_peminjaman }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->jenis_barang }}</td>
                <td>{{ $data->tgl_pinjam }}</td>
                <td>{{ $data->tgl_kembali }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->ket }}</td>
                <td><a href="admin_pbd/{{ $data->id_peminjaman }}" class="btn btn-primary">Kembali</a></td>
            </tr>
        @endforeach
        </tbody>
  </table>
</div>
@endsection