<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index')->with([
            'data' => Kelas::all()
        ]);
    }

    public function simpan(Request $req)
    {
       $simpan = new Kelas();
       $simpan->nama_kelas = $req['namakelas'];
       $simpan->jurusan = $req['jurusan'];
       $simpan->save();
       return redirect()->route('kelas.index');
    }

    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        return view('kelas.edit')->with([
            'data' => $data
        ]);
    }

    public function prosesedit(Request $req, $id)
    {
       $simpan = Kelas::findOrFail($id);
       $simpan->nama_kelas = $req['namakelas'];
       $simpan->jurusan = $req['jurusan'];
       $simpan->save();
       return redirect()->route('kelas.index');
    }

    public function hapus($id)
    {
        $data = Kelas::findOrFail($id);
        $data->delete();
        return redirect()->route('kelas.index');
    }
}
