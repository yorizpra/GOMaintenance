@extends('layouts/main')

@section('title', 'Data Ketua Jurusan')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Data Ketua Jurusan</h1></center>
  <a href="/registerkajur" class="btn btn-primary my-3">Tambah Data Kajur</a>  

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
            <th scope="col">ID_Kajur</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $chiefs as $chief )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $chief->id_kajur }}</td>
                <td>{{ $chief->nama }}</td>
                <td>{{ $chief->jenis_kelamin }}</td>
                <td>{{ $chief->no_telepon }}</td>
                <td>{{ $chief->alamat }}</td>
                <td>
                    <a href="chiefs/{{ $chief->id_kajur }}" class="btn btn-primary">Edit</a>
                    <form action="chiefs/{{ $chief->id_kajur }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
  </table>
</div>
@endsection