<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laporan</title>
</head>
<body onload="print()">
    <center>
    <h2>Rekapitulasi Pembayaran SPP</h2>
    <hr>
    <table width="100%" border="1" style="border-collapse: collapse">
        <tr style="color: blue">
            <th>NISN</th>
            <th>Nama</th>
            <th>Bulan bayar</th>
            <th>Tanggal bayar</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <th>{{ App\Models\Siswa::find($d->id_siswa)->nisn }}</th>
            <th>{{ App\Models\User::find($d->id_user)->name }}</th>
            <th>{{ $d->bulan_dibayar }}</th>
            <th>{{ $d->tgl_bayar }}</th>
        </tr>
        @endforeach

    </table>
    </center>
</body>
</html>
