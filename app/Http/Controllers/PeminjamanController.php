<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Peminjaman;
use App\Person;
use App\Room;
use DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('borrows')
            ->join('people', 'people.id_user', '=', 'borrows.id_user')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrows.id_ruangan')
            ->select('borrows.*', 'people.*', 'rooms.*')
            ->where('people.id_user', session('id_user'))
            ->get();
            return view('borrows/index', compact('datas'));
    }

    public function indexAdmin()
    {
        $datas = DB::table('borrows')
            ->join('people', 'people.id_user', '=', 'borrows.id_user')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrows.id_ruangan')
            ->select('borrows.*', 'people.*', 'rooms.*')
            
            ->get();
            return view('admin_prm/index', compact('datas'));
    }
    
    public function indexKajur()
    {
        $datas = DB::table('borrows')
            ->join('people', 'people.id_user', '=', 'borrows.id_user')
            ->join('rooms', 'rooms.id_ruangan', '=', 'borrows.id_ruangan')
            ->select('borrows.*', 'people.*', 'rooms.*')
            
            ->get();
            return view('rekap_prm/index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Person::select('id_user','nama')->where('id_user', session('id_user'))->get();
        $ruangan = Room::select('id_ruangan','nama_ruangan')->get();
        return view('/borrows/create',compact('datas', 'ruangan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Peminjaman();
     
        $data->id_user = $request->input('id_user');
        $data->id_ruangan = $request->input('id_ruangan');
        $data->tgl_pinjam = $request->input('tgl_pinjam');
        $data->tgl_kembali = $request->input('tgl_kembali');
        $data->status = $request->input('status');
        $data->ket = $request->input('ket');
        $data->save();
    return redirect('/borrows')->with('status','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        $data = Peminjaman::findOrFail($id_peminjaman);
        return view('admin_prm/edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peminjaman)
    {
        $data = Peminjaman::findOrFail($id_peminjaman);
        
        $request->validate([
            'status' => 'required'
        ]);

        Peminjaman::where('id_peminjaman', $data->id_peminjaman)->update([
            'status' => $request->status
        ]);

        $data->save();
        return redirect('/admin_prm')->with('status','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
