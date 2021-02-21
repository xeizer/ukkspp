<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        return view('petugas.index')->with([
            'data' => User::all()
        ]);
    }

    public function simpan(Request $req)
    {
       $simpan = new User();
       $simpan->name = $req['nama'];
       $simpan->email = $req['email'];
       $simpan->password = $req['password'];
       $simpan->save();
       return redirect()->route('petugas.index');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('petugas.edit')->with([
            'data' => $data
        ]);
    }

    public function prosesedit(Request $req, $id)
    {
       $simpan = User::findOrFail($id);
       $simpan->name = $req['nama'];
       $simpan->email = $req['email'];
       $simpan->password = $req['password'];
       $simpan->save();
       return redirect()->route('petugas.index');
    }

    public function hapus($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('petugas.index');
    }
}
