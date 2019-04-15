<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operator';
    protected $primaryKey ='id_operator';

    public function users() {
    	return $this->hasOne('App\User', 'id_users', 'id_users');
    }

    public function peminjaman() {
    	return $this->hasMany('App\Pjm', 'id_operator', 'id_operator');
    }
}
