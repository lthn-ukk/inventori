<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;
use App\Barang;
use App\Ruang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::all();
        $ruang = Ruang::all();
        $dbBarang = Barang::all();
        $paginate = 10;

        return view('admin.barangTambah', ['barang' => \AppHelper::instance()->pagination($dbBarang, $paginate), 'pg' => $paginate], compact('jenis', 'ruang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kdBarang' => 'max:5',
        ]);

        $barang = new Barang;
        $barang->nama = $request->nmBarang;
        $barang->kondisi = $request->kondisi;
        $barang->jumlah = $request->jmlBarang;
        $barang->id_jenis = $request->jnsBarang;
        $barang->tanggal_register = $request->tglRegister;
        $barang->id_ruang = $request->rgBarang;
        $barang->kode_inventaris = $request->kdBarang;
        $barang->keterangan = $request->keterangan;
        $barang->id_users = \Auth::user()->id_users;
        $barang->save();

        return redirect('/barang')->with('message', 'Invntaris (Tambah) berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dbarang=Barang::find($id);
        $paginate = 10;
        $barang=Barang::paginate($paginate);
        $jenis = Jenis::all();
        $ruang = Ruang::all();

        return view('admin.barangEdit', compact('barang', 'jenis', 'ruang', 'dbarang'), ['pg' => $paginate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kdBarang' => 'max:5',
        ]);

        $barang = Barang::find($id);
        $barang->nama = $request->nmBarang;
        $barang->kondisi = $request->kondisi;
        $barang->jumlah = $request->jmlBarang;
        $barang->id_jenis = $request->jnsBarang;
        $barang->tanggal_register = $request->tglRegister;
        $barang->id_ruang = $request->rgBarang;
        $barang->kode_inventaris = $request->kdBarang;
        $barang->keterangan = $request->keterangan;
        $barang->save();

        return redirect('/barang')->with('message', 'Inventaris (Ubah) berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect('/barang')->with('message', 'Invenntaris (Hapus) berhasil!');
    }
}
