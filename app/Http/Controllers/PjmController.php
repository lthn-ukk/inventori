<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pjm;

class PjmController extends Controller
{
    public function index() {
    	$paginate = 10;
    	$pjm = Pjm::paginate($paginate);

    	return view('admin.peminjaman', compact('pjm', 'paginate', 'dPjm'));
    }
}
