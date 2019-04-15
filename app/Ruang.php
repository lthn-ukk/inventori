<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';
    protected $primaryKey = 'id_ruang';
    public $timestamps = false;

    public function barang() {
    	return $this->hasMany('App\Barang', 'id_ruang', 'id_ruang');
    }
}
