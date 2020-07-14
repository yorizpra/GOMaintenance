<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peminjaman extends Model
{
    use SoftDeletes;
    protected $table        = 'borrows';
    protected $primaryKey   = 'id_peminjaman';
    protected $fillable     = ['id_peminjaman', 'id_user', 'id_ruangan', 'tgl_pinjam', 'tgl_kembali', 'status', 'ket'];

    
    public function room(){
        return $this->hasMany('App/Room', 'id_ruangan');
    }
    public function people(){
        return $this->hasMany('App/People', 'id_user');
    }
}