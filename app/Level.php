<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'level';
    protected $primaryKey = 'id_level';
    public $timestamps = false;

    public function user() {
    	return $this->hasMany('App\User', 'id_level', 'id_level');
    }
}
