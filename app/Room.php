<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    protected $table        = 'rooms';
    protected $primaryKey   = 'id_ruangan';
    protected $fillable     = ['id_ruangan', 'nama_ruangan'];

    public function peminjaman(){
        return $this->belosngsTo('App/Peminjaman');
    }
}
