<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jenis;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbJenis = Jenis::all();
        $paginate = 10;

        return view('admin.jenisTambah', ['jenis' => \AppHelper::instance()->pagination($dbJenis, $paginate), 'pg' => $paginate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'kdJenis' => 'max:5'
        ]);

        $jenis = new Jenis;
        $jenis->nama_jenis = $request->nmJenis;
        $jenis->kode_jenis = $request->kdJenis;
        $jenis->keterangan = $request->keterangan;
        $jenis->save();

        return redirect('/jenis')->with('message', 'Jenis (Tambah) berhasil!');
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
        $djenis=Jenis::find($id);
        $paginate = 10;
        $jenis=Jenis::paginate($paginate);

        return view('admin.jenisEdit', compact('jenis', 'djenis'), ['pg' => $paginate]);
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
        $jenis = Jenis::find($id);
        $jenis->nama_jenis = $request->nmJenis;
        $jenis->kode_jenis = $request->kdJenis;
        $jenis->keterangan = $request->keterangan;
        $jenis->save();

        return redirect('/jenis')->with('message', 'Jenis (Ubah) berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenis = Jenis::find($id);
        $jenis->delete();

        return redirect('/jenis')->with('message', 'Jenis (Hapus) berhasil!');
    }
}
