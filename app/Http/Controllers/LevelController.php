<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 10;
        $dbLevel = Level::paginate($paginate);

        return view('admin.levelTambah', ['level' => $dbLevel, 'pg' => $paginate]);
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

        $level = new Level;
        $level->nama_level = $request->nmLevel;
        $level->save();

        return redirect('/level')->with('message', 'Level (Tambah) berhasil!');
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
        $dlevel=Level::find($id);
        $paginate = 0;
        $level = Level::paginate(10);
        
        return view('admin.levelEdit', compact('level', 'dlevel'), ['pg' => $paginate]);
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
        $level = Level::find($id);
        $level->nama_level = $request->nmLevel;
        $level->save();

        return redirect('/level')->with('message', 'Level (Ubah) berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        $level->delete();

        return redirect('/level')->with('message', 'Level (Hapus) berhasil!');
    }
}
