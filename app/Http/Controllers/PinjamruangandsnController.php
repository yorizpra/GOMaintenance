<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Pinjamruangandsn;
use App\Lecturer;
use App\Room;
use DB;

class PinjamruangandsnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('borrow_room_dsn')
            ->join('lecturers', 'lecturers.id_dosen', '=', 'borrow_room_dsn.id_dosen')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrow_room_dsn.id_ruangan')
            ->select('borrow_room_dsn.*', 'lecturers.*', 'rooms.*')
            ->where('lecturers.id_dosen', session('id_dosen'))
            ->get();
            return view('pinjamruangandsn/index', compact('datas'));
    }

    public function indexAdmin()
    {
        $datas = DB::table('borrow_room_dsn')
            ->join('lecturers', 'lecturers.id_dosen', '=', 'borrow_room_dsn.id_dosen')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrow_room_dsn.id_ruangan')
            ->select('borrow_room_dsn.*', 'lecturers.*', 'rooms.*')
            
            ->get();
            return view('admin_prd/index', compact('datas'));
    }
    
    public function indexKajur()
    {
        $datas = DB::table('borrow_room_dsn')
            ->join('lecturers', 'lecturers.id_dosen', '=', 'borrow_room_dsn.id_dosen')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrow_room_dsn.id_ruangan')
            ->select('borrow_room_dsn.*', 'lecturers.*', 'rooms.*')
            
            ->get();
            return view('rekap_prd/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Lecturer::select('id_dosen','nama')->where('id_dosen', session('id_dosen'))->get();
        $ruangan = Room::select('id_ruangan','nama_ruangan')->get();
        return view('/pinjamruangandsn/create',compact('datas', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Pinjamruangandsn();
     
        $data->id_dosen = $request->input('id_dosen');
        $data->id_ruangan = $request->input('id_ruangan');
        $data->tgl_pinjam = $request->input('tgl_pinjam');
        $data->tgl_kembali = $request->input('tgl_kembali');
        $data->status = $request->input('status');
        $data->ket = $request->input('ket');
        $data->save();
    return redirect('/pinjamruangandsn')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pinjamruangandsn  $pinjamruangandsn
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjamruangandsn $pinjamruangandsn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pinjamruangandsn  $pinjamruangandsn
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        $data = Pinjamruangandsn::findOrFail($id_peminjaman);
        return view('admin_prd/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pinjamruangandsn  $pinjamruangandsn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peminjaman)
    {
        $data = Pinjamruangandsn::findOrFail($id_peminjaman);
        
        $request->validate([
            'status' => 'required'
        ]);

        Pinjamruangandsn::where('id_peminjaman', $data->id_peminjaman)->update([
            'status' => $request->status
        ]);

        $data->save();
        return redirect('/admin_prd')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pinjamruangandsn  $pinjamruangandsn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjamruangandsn $pinjamruangandsn)
    {
        //
    }
}
