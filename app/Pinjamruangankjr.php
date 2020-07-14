<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjamruangankjr extends Model
{
    use SoftDeletes;
    protected $table        = 'borrow_room_kjr';
    protected $primaryKey   = 'id_peminjaman';
    protected $fillable     = ['id_peminjaman', 'id_kajur', 'id_ruangan', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    
    public function room(){
        return $this->hasMany('App/Room', 'id_ruangan');
    }
    public function chief(){
        return $this->hasMany('App/Chief', 'id_kajur');
    }
}