<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        
        return view('items/index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items/create');
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
            'jenis_barang' => 'required',
            'merek_barang' => 'required',
            'jumlah_barang' => 'required',
            'kondisi_barang' => 'required'
        ]);

        Item::create($request->all());

        return redirect('/items')->with('status', 'Data Barang Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('items/edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'jenis_barang' => 'required',
            'merek_barang' => 'required',
            'jumlah_barang' => 'required',
            'kondisi_barang' => 'required'
        ]);

        Item::where('id_barang', $item->id_barang)->update([
            'jenis_barang' => $request->jenis_barang,
            'merek_barang' => $request->merek_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'kondisi_barang' => $request->kondisi_barang
        ]);
        return redirect('/items')->with('status', 'Data Barang Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        Item::destroy($item->id_barang);
        return redirect('/items')->with('status', 'Data Barang Berhasil Dihapus!');
    }
}
