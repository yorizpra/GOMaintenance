<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chief extends Model
{
    use SoftDeletes;
    protected $table        = 'chiefs';
    protected $primaryKey   = 'id_kajur';
    protected $fillable     = ['id_kajur', 'nama', 'jenis_kelamin', 'no_telepon', 'alamat', 'level_user'];

    public function peminjaman(){
        return $this->belosngsTo('App/Peminjaman');
    }
}
