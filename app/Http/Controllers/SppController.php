<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        return view('spp.index')->with([
            'data' => Spp::all()
        ]);
    }

    public function simpan(Request $req)
    {
       $simpan = new Spp();
       $simpan->tahun = $req['tahun'];
       $simpan->nominal = $req['nominal'];
       $simpan->save();
       return redirect()->route('spp.index');
    }

    public function edit($id)
    {
        $data = Spp::findOrFail($id);
        return view('spp.edit')->with([
            'data' => $data
        ]);
    }

    public function prosesedit(Request $req, $id)
    {
       $simpan = Spp::findOrFail($id);
       $simpan->tahun = $req['tahun'];
       $simpan->nominal = $req['nominal'];
       $simpan->save();
       return redirect()->route('spp.index');
    }

    public function hapus($id)
    {
        $data = Spp::findOrFail($id);
        $data->delete();
        return redirect()->route('spp.index');
    }
}
