<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    public $timestamps = false;

    public function barang() {
    	return $this->hasMany('App\Barang', 'id_jenis', 'id_jenis');
    }
}
