<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruang;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbRuang = Ruang::all();
        $paginate = 10;

        return view('admin.ruangTambah', ['ruang' => \AppHelper::instance()->pagination($dbRuang, $paginate), 'pg' => $paginate]);
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
            'kdRuang' => 'max:5'
        ]);

        $ruang = new Ruang;
        $ruang->nama_ruang = $request->nmRuang;
        $ruang->kode_ruang = $request->kdRuang;
        $ruang->keterangan = $request->keterangan;
        $ruang->save();

        return redirect('/ruang')->with('message', 'Ruangan (Tambah) berhasil!');
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
        $druang=Ruang::find($id);
        $paginate = 10;
        $ruang=Ruang::paginate($paginate);
        return view('admin.ruangEdit', compact('ruang', 'druang'), ['pg' => $paginate]);
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
            'kdRuang' => 'max:5'
        ]);
        
        $ruang = Ruang::find($id);
        $ruang->nama_ruang = $request->nmRuang;
        $ruang->kode_ruang = $request->kdRuang;
        $ruang->keterangan = $request->keterangan;
        $ruang->save();

        return redirect('/ruang')->with('message', 'Ruangan (Ubah) berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ruang = Ruang::find($id);
        $ruang->delete();

        return redirect('/ruang')->with('message', 'Ruangan (Hapus) berhasil!');
    }
}
