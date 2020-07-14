<?php

namespace App\Http\Controllers;

use App\Chief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChiefsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chiefs = Chief::all();
        
        return view('chiefs/index', compact('chiefs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chiefs/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'level_user' => 'required'
        ]);

        Chief::create($request->all());

        return redirect('/chiefs')->with('status', 'Data Ketua Jurusan Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chief  $chief
     * @return \Illuminate\Http\Response
     */
    public function show(Chief $chief)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chief  $chief
     * @return \Illuminate\Http\Response
     */
    public function edit(Chief $chief)
    {
        return view('chiefs/edit', compact('chief'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chief  $chief
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chief $chief)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'no_telepon' => 'required',
            'alamat' => 'required'
        ]);

        Chief::where('id_kajur', $chief->id_kajur)->update([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat
        ]);
        return redirect('/chiefs')->with('status', 'Data Ketua Jurusan Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chief  $chief
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chief $chief)
    {
        Chief::destroy($chief->id_kajur);
        return redirect('/chiefs')->with('status', 'Data Ketua Jurusan Berhasil Dihapus!');
    }
}
