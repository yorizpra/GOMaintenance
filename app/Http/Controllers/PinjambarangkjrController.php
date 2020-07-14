<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Pinjambarangkjr;
use App\Chief;
use App\Item;
use DB;

class PinjambarangkjrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('borrow_item_kjr')
            ->join('chiefs', 'chiefs.id_kajur', '=', 'borrow_item_kjr.id_kajur')
            ->join('items', 'items.id_barang', '=', 'borrow_item_kjr.id_barang')
            ->select('borrow_item_kjr.*', 'chiefs.*', 'items.*')
            ->where('chiefs.id_kajur', session('id_kajur'))
            ->get();
            return view('pinjambarangkjr/index', compact('datas'));
    }

    public function indexAdmin()
    {
        $datas = DB::table('borrow_item_kjr')
            ->join('chiefs', 'chiefs.id_kajur', '=', 'borrow_item_kjr.id_kajur')
            ->join('items', 'items.id_barang', '=', 'borrow_item_kjr.id_barang')
            ->select('borrow_item_kjr.*', 'chiefs.*', 'items.*')
            
            ->get();
            return view('admin_pbk/index', compact('datas'));
    }
    
    public function indexKajur()
    {
        $datas = DB::table('borrow_item_kjr')
            ->join('chiefs', 'chiefs.id_kajur', '=', 'borrow_item_kjr.id_kajur')
            ->join('items', 'items.id_barang', '=', 'borrow_item_kjr.id_barang')
            ->select('borrow_item_kjr.*', 'chiefs.*', 'items.*')
            
            ->get();
            return view('rekap_pbk/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Chief::select('id_kajur','nama')->where('id_kajur', session('id_kajur'))->get();
        $barang = Item::select('id_barang','jenis_barang')->get();
        return view('/pinjambarangkjr/create',compact('datas', 'barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pinjambarangkjr();
     
        $data->id_kajur = $request->input('id_kajur');
        $data->id_barang = $request->input('id_barang');
        $data->jumlah_pinjam = $request->input('jumlah_pinjam');
        $data->tgl_pinjam = $request->input('tgl_pinjam');
        $data->tgl_kembali = $request->input('tgl_kembali');
        $data->status = $request->input('status');
        $data->ket = $request->input('ket');
        $data->save();
        return redirect('/pinjambarangkjr')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pinjambarangkjr  $pinjambarangkjr
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjambarangkjr $pinjambarangkjr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pinjambarangkjr  $pinjambarangkjr
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        $data = Pinjambarangkjr::findOrFail($id_peminjaman);
        return view('admin_pbk/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pinjambarangkjr  $pinjambarangkjr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peminjaman)
    {
        $data = Pinjambarangkjr::findOrFail($id_peminjaman);
        
        $request->validate([
            'status' => 'required'
        ]);

        Pinjambarangkjr::where('id_peminjaman', $data->id_peminjaman)->update([
            'status' => $request->status
        ]);

        $data->save();
        return redirect('/admin_pbk')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pinjambarangkjr  $pinjambarangkjr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjambarangkjr $pinjambarangkjr)
    {
        //
    }
}
