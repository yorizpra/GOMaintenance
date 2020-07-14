<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Pinjamruangankjr;
use App\Chief;
use App\Room;
use DB;

class PinjamruangankjrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('borrow_room_kjr')
            ->join('chiefs', 'chiefs.id_kajur', '=', 'borrow_room_kjr.id_kajur')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrow_room_kjr.id_ruangan')
            ->select('borrow_room_kjr.*', 'chiefs.*', 'rooms.*')
            ->where('chiefs.id_kajur', session('id_kajur'))
            ->get();
            return view('pinjamruangankjr/index', compact('datas'));
    }

    public function indexAdmin()
    {
        $datas = DB::table('borrow_room_kjr')
            ->join('chiefs', 'chiefs.id_kajur', '=', 'borrow_room_kjr.id_kajur')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrow_room_kjr.id_ruangan')
            ->select('borrow_room_kjr.*', 'chiefs.*', 'rooms.*')
            
            ->get();
            return view('admin_prk/index', compact('datas'));
    }
    
    public function indexKajur()
    {
        $datas = DB::table('borrow_room_kjr')
            ->join('chiefs', 'chiefs.id_kajur', '=', 'borrow_room_kjr.id_kajur')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrow_room_kjr.id_ruangan')
            ->select('borrow_room_kjr.*', 'chiefs.*', 'rooms.*')
            
            ->get();
            return view('rekap_prk/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Chief::select('id_kajur','nama')->where('id_kajur', session('id_kajur'))->get();
        $ruangan = Room::select('id_ruangan','nama_ruangan')->get();
        return view('/pinjamruangankjr/create',compact('datas', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pinjamruangankjr();
     
        $data->id_kajur = $request->input('id_kajur');
        $data->id_ruangan = $request->input('id_ruangan');
        $data->tgl_pinjam = $request->input('tgl_pinjam');
        $data->tgl_kembali = $request->input('tgl_kembali');
        $data->status = $request->input('status');
        $data->ket = $request->input('ket');
        $data->save();
    return redirect('/pinjamruangankjr')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pinjamruangankjr  $pinjamruangankjr
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjamruangankjr $pinjamruangankjr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pinjamruangankjr  $pinjamruangankjr
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        $data = Pinjamruangankjr::findOrFail($id_peminjaman);
        return view('admin_prk/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pinjamruangankjr  $pinjamruangankjr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peminjaman)
    {
        $data = Pinjamruangankjr::findOrFail($id_peminjaman);
        
        $request->validate([
            'status' => 'required'
        ]);

        Pinjamruangankjr::where('id_peminjaman', $data->id_peminjaman)->update([
            'status' => $request->status
        ]);

        $data->save();
        return redirect('/admin_prk')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pinjamruangankjr  $pinjamruangankjr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjamruangankjr $pinjamruangankjr)
    {
        //
    }
}
