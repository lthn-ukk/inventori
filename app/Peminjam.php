<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    protected $table = 'peminjam';
    protected $primaryKey ='id_peminjam';

    public function users() {
    	return $this->hasOne('App\User', 'id_users', 'id_users');
    }

    public function peminjaman() {
    	return $this->hasMany('App\Pjm', 'id_peminjam', 'id_peminjam');
    }
}
