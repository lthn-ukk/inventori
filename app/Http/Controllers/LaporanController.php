<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Jenis;
use App\Ruang;

class LaporanController extends Controller
{
    public function index($objek, $data) {
    	if ($data == 'barang') {
    		$datas = Barang::all();
    	} elseif ($data == 'jenis') {
    		$datas = Jenis::all();
    	} elseif ($data == 'ruang') {
    		$datas = Ruang::all();
    	}

    	return view($objek, compact('datas'));
    }

    public function downloadPDF($objek, $data) {
    	if ($data == 'barang') {
    		$datas = Barang::all();
    	} elseif ($data == 'jenis') {
    		$datas = Jenis::all();
    	} elseif ($data == 'ruang') {
    		$datas = Ruang::all();
    	}

    	$pdf = \PDF::loadView($objek, compact('datas'));
        return $pdf->download(date('d-m-Y').' '.date('H:i:s').'.pdf');
    }
}
