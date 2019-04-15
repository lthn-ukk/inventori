<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPjm extends Model
{
    protected $table = 'detailpinjam';
    protected $primaryKey ='id_detailPinjam';

    public function peminjaman() {
    	return $this->belongsTo('App\Pjm', 'id_peminjaman', 'id_peminjaman');
    }

    public function barang() {
    	return $this->belongsTo('App\Barang', 'id_inventaris', 'id_inventaris');
    }
}
