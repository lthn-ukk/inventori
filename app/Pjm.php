<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pjm extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey ='id_peminjaman';

    public function detailPjm() {
    	return $this->hasMany('App\DetailPjm', 'id_peminjaman', 'id_peminjaman');
    }

    public function peminjam() {
    	return $this->belongsTo('App\Peminjam', 'id_peminjam', 'id_peminjam');
    }

    public function operator() {
    	return $this->belongsTo('App\Operator', 'id_operator', 'id_operator');
    }
}
