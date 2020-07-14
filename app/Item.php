<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $table        = 'items';
    protected $primaryKey   = 'id_barang';
    protected $fillable     = ['id_barang', 'jenis_barang', 'merek_barang', 'jumlah_barang', 'kondisi_barang'];

    public function peminjaman(){
        return $this->belosngsTo('App/Peminjaman');
    }
}
