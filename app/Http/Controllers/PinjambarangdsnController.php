<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Pinjambarangdsn;
use App\Lecturer;
use App\Item;
use DB;

class PinjambarangdsnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('borrow_item_dsn')
            ->join('lecturers', 'lecturers.id_dosen', '=', 'borrow_item_dsn.id_dosen')
            ->join('items', 'items.id_barang', '=', 'borrow_item_dsn.id_barang')
            ->select('borrow_item_dsn.*', 'lecturers.*', 'items.*')
            ->where('lecturers.id_dosen', session('id_dosen'))
            ->get();
            return view('pinjambarangdsn/index', compact('datas'));
    }

    public function indexAdmin()
    {
        $datas = DB::table('borrow_item_dsn')
            ->join('lecturers', 'lecturers.id_dosen', '=', 'borrow_item_dsn.id_dosen')
            ->join('items', 'items.id_barang', '=', 'borrow_item_dsn.id_barang')
            ->select('borrow_item_dsn.*', 'lecturers.*', 'items.*')
            
            ->get();
            return view('admin_pbd/index', compact('datas'));
    }
    
    public function indexKajur()
    {
        $datas = DB::table('borrow_item_dsn')
            ->join('lecturers', 'lecturers.id_dosen', '=', 'borrow_item_dsn.id_dosen')
            ->join('items', 'items.id_barang', '=', 'borrow_item_dsn.id_barang')
            ->select('borrow_item_dsn.*', 'lecturers.*', 'items.*')
            
            ->get();
            return view('rekap_pbd/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Lecturer::select('id_dosen','nama')->where('id_dosen', session('id_dosen'))->get();
        $barang = Item::select('id_barang','jenis_barang')->get();
        return view('/pinjambarangdsn/create',compact('datas', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pinjambarangdsn();
     
        $data->id_dosen = $request->input('id_dosen');
        $data->id_barang = $request->input('id_barang');
        $data->jumlah_pinjam = $request->input('jumlah_pinjam');
        $data->tgl_pinjam = $request->input('tgl_pinjam');
        $data->tgl_kembali = $request->input('tgl_kembali');
        $data->status = $request->input('status');
        $data->ket = $request->input('ket');
        $data->save();
        return redirect('/pinjambarangdsn')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pinjambarangdsn  $pinjambarangdsn
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjambarangdsn $pinjambarangdsn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pinjambarangdsn  $pinjambarangdsn
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        $data = Pinjambarangdsn::findOrFail($id_peminjaman);
        return view('admin_pbd/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pinjambarangdsn  $pinjambarangdsn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peminjaman)
    {
        $data = Pinjambarangdsn::findOrFail($id_peminjaman);
        
        $request->validate([
            'status' => 'required'
        ]);

        Pinjambarangdsn::where('id_peminjaman', $data->id_peminjaman)->update([
            'status' => $request->status
        ]);

        $data->save();
        return redirect('/admin_pbd')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pinjambarangdsn  $pinjambarangdsn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjambarangdsn $pinjambarangdsn)
    {
        //
    }
}
