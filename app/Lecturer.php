<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lecturer extends Model
{
    use SoftDeletes;
    protected $table        = 'lecturers';
    protected $primaryKey   = 'id_dosen';
    protected $fillable     = ['id_dosen', 'nama', 'jenis_kelamin', 'no_telepon', 'alamat', 'level_user'];

    public function peminjaman(){
        return $this->belosngsTo('App/Peminjaman');
    }
}