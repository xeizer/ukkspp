<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        return view('siswa.index')->with([
            'data' => Siswa::all()
        ]);
    }

    public function simpan(Request $req)
    {
        $simpanuser = new User();
        $simpanuser->name = $req['namasiswa'];
        $simpanuser->email = $req['emailsiswa'];
        $simpanuser->password = bcrypt($req['password']);
        $simpanuser->save();
        $simpanuser->attachRole('siswa');

        $simpansiswa = new Siswa();
        $simpansiswa->id_user = $simpanuser->id;
        $simpansiswa->nisn = $req['nisn'];
        $simpansiswa->nis = $req['nis'];
        $simpansiswa->id_kelas = $req['kelas'];
        $simpansiswa->alamat = $req['alamat'];
        $simpansiswa->no_tlp = $req['tlp'];
        $simpansiswa->id_spp = $req['spp'];
        $simpansiswa->save();
        return redirect()->route('siswa.index');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('siswa.edit')->with([
            'data' => $data
        ]);
    }

    public function prosesedit(Request $req, $id)
    {
        $simpanuser = User::findOrFail($id);
        $simpanuser->name = $req['namasiswa'];
        $simpanuser->email = $req['emailsiswa'];
        $simpanuser->password = bcrypt($req['password']);
        $simpanuser->save();

        $simpansiswa = Siswa::where('id_user', $id)->firstOrFail();
        $simpansiswa->nisn = $req['nisn'];
        $simpansiswa->nis = $req['nis'];
        $simpansiswa->id_kelas = $req['kelas'];
        $simpansiswa->alamat = $req['alamat'];
        $simpansiswa->no_tlp = $req['tlp'];
        $simpansiswa->id_spp = $req['spp'];
        $simpansiswa->save();
        return redirect()->route('siswa.index');
    }

    public function hapus($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('siswa.index');
    }
}
