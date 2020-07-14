@extends('layouts/main')

@section('title', 'Daftar Dosen')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Daftar Dosen</h1></center>
  <a href="/registerdosen" class="btn btn-primary my-3">Tambah Data Dosen</a>  

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
            <th scope="col">ID_Dosen</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Nomor Telepon</th>
            <th scope="col">Alamat</th>
            <!-- <th scope="col">Level Dosen</th> -->
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $lecturers as $lecturer )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $lecturer->id_dosen }}</td>
                <td>{{ $lecturer->nama }}</td>
                <td>{{ $lecturer->jenis_kelamin }}</td>
                <td>{{ $lecturer->no_telepon }}</td>
                <td>{{ $lecturer->alamat }}</td>
                <!-- <td>{{ $lecturer->level_user }}</td> -->
                <td>
                    <a href="lecturers/{{ $lecturer->id_dosen }}" class="btn btn-primary">Edit</a>
                    <form action="lecturers/{{ $lecturer->id_dosen }}" method="post" class="d-inline">
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