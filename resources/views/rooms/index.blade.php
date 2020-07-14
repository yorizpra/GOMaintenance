@extends('layouts/main')

@section('title', 'Data Ruangan')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Data Ruangan</h1></center>
  <a href="/rooms/Create" class="btn btn-primary my-3">Tambah Data Ruangan</a>  

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
            <th scope="col">ID_Ruangan</th>
            <th scope="col">Nama Ruangan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $rooms as $room )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $room->id_ruangan }}</td>
                <td>{{ $room->nama_ruangan }}</td>
                <td>
                    <a href="rooms/{{ $room->id_ruangan }}" class="btn btn-primary">Edit</a>
                    <form action="rooms/{{ $room->id_ruangan }}" method="post" class="d-inline">
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