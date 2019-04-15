<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "inventaris";
    protected $primaryKey = "id_inventaris";
    public $timestamps = false;

    public function jenis() {
    	return $this->belongsTo('App\Jenis', 'id_jenis', 'id_jenis');
    }

    public function ruang() {
    	return $this->belongsTo('App\Ruang', 'id_ruang', 'id_ruang');
    }

    public function users() {
    	return $this->belongsTo('App\User', 'id_users', 'id_users');
    }
}
