<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjambarangkjr extends Model
{
    use SoftDeletes;
    protected $table        = 'borrow_item_kjr';
    protected $primaryKey   = 'id_peminjaman';
    protected $fillable     = ['id_peminjaman', 'id_kajur', 'id_barang', 'jumlah_pinjam', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    
    public function item(){
        return $this->hasMany('App/item', 'id_barang');
    }
    public function chief(){
        return $this->hasMany('App/Chief', 'id_kajur');
    }
}