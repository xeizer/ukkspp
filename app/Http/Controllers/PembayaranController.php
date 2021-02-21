<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Siswa;

class PembayaranController extends Controller
{
    public function bayar(Request $req, $id)
    {
        $simpan = new Pembayaran();
        $simpan->id_user = User::find($id)->id;
        $simpan->id_siswa = Siswa::where('id_user', $id)->first()->id;
        $simpan->tgl_bayar = $req['tanggal'];
        $simpan->bulan_dibayar = $req['bulan'];
        $simpan->tahun_dibayar = $req['tahun'];
        $simpan->save();
        return redirect()->route('bayar.index');
    }
    public function laporan()
    {
        return view('laporan.laporan')->with([
            'data' => Pembayaran::all()
        ]);
    }
}
