@extends('layouts/kjr')

@section('title', 'Pinjam Ruangan')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Pinjam Ruangan</h1></center>
  <a href="/pinjamruangankjr/create" class="btn btn-primary my-3">Pinjam Ruangan</a>  

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
            <th scope="col">Nama Ketua Jurusan</th>
            <th scope="col">Nama Ruangan</th>
            <th scope="col">Tanggal Pinjam</th>
            <th scope="col">Tanggal Kembali</th>
            <th scope="col">Status</th>
            <th scope="col">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $datas as $data )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $data->id_peminjaman }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->nama_ruangan }}</td>
                <td>{{ $data->tgl_pinjam }}</td>
                <td>{{ $data->tgl_kembali }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->ket }}</td>
            </tr>
        @endforeach
        </tbody>
  </table>
</div>
@endsection