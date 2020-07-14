<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pinjamruangandsn extends Model
{
    use SoftDeletes;
    protected $table        = 'borrow_room_dsn';
    protected $primaryKey   = 'id_peminjaman';
    protected $fillable     = ['id_peminjaman', 'id_dosen', 'id_ruangan', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    
    public function room(){
        return $this->hasMany('App/Room', 'id_ruangan');
    }
    public function lecturer(){
        return $this->hasMany('App/Lecturer', 'id_dosen');
    }
}