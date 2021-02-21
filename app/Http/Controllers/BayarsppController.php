<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\Siswa;

class BayarsppController extends Controller
{
    public function index()
    {
        return view('bayarspp.index');
    }
    public function carisiswa(Request $req)
    {
        $data = Siswa::where('nisn', $req['nisn'])->first();

        if ($data) {
            $pembayaran = Pembayaran::where('id_siswa', $data->id)->get();
            return view('bayarspp.index')->with([
                'data' => $data,
                'siswabayar' => true,
                'pembayaran' => $pembayaran,
            ]);
        } else {
            return view('bayarspp.index')->with([
                'data' => false,
                'siswabayar' => false
            ]);
        };
    }
}
