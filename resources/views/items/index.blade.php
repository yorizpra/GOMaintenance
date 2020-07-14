@extends('layouts/main')

@section('title', 'Data Barang')

@section('container')
<div class="container">
  <center><h1 class="mt-3">Data Barang</h1></center>
  <a href="/items/Create" class="btn btn-primary my-3">Tambah Data Barang</a>  

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
            <th scope="col">ID_Barang</th>
            <th scope="col">Jenis Barang</th>
            <th scope="col">Merek Barang</th>
            <th scope="col">Jumlah Barang</th>
            <th scope="col">Kondisi Barang</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $items as $item )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->id_barang }}</td>
                <td>{{ $item->jenis_barang }}</td>
                <td>{{ $item->merek_barang }}</td>
                <td>{{ $item->jumlah_barang }}</td>
                <td>{{ $item->kondisi_barang }}</td>
                <td>
                    <a href="items/{{ $item->id_barang }}" class="btn btn-primary">Edit</a>
                    <form action="items/{{ $item->id_barang }}" method="post" class="d-inline">
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