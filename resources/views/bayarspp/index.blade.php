@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">bayar SPP</div>

                    <div class="card-body">
                        <form action="{{ route('bayar.carisiswa') }}" method="POST" class="form-inline">
                            @csrf
                            <label>NISN</label>
                            <input type="number" name="nisn" class="form-control">
                            <input type="submit" class="btn btn-primary" value="CARI">
                        </form>
                        @isset($siswabayar)
                            @if ($data)
                                <div class="row">
                                    <div class="col-12 mt-1">
                                        <h4>{{ App\Models\User::find($data->id_user)->name }}</h4>
                                        <!-- Button to Open the Modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModal">
                                            bayar SPP
                                        </button>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Bayar SPP</h4>
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <form action="{{ route('bayar.proses', ['id' => $data->id_user]) }}" method="POST">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Tanggal<label>
                                                                <input type="date" name="tanggal" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Bulan<label>
                                                                <select name="bulan" class="form-control">
                                                                    <option value="Januari">Januari</option>
                                                                    <option value="Februari">Februari</option>
                                                                    <option value="Maret">Maret</option>
                                                                    <option value="April">April</option>
                                                                    <option value="Mei">Mei</option>
                                                                    <option value="Juni">Juni</option>
                                                                    <option value="Juli">Juli</option>
                                                                    <option value="Agustus">Agustus</option>
                                                                    <option value="September">September</option>
                                                                    <option value="Oktober">Oktober</option>
                                                                    <option value="November">November</option>
                                                                    <option value="Desember">Desember</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tahun<label>
                                                                <input type="number" name="tahun" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Nominal SPP</label>
                                                                <b>{{ App\Models\Spp::find($data->id_spp)->nominal }}</b>
                                                            </div>
                                                            <input type="submit" class="btn btn-primary" value="Bayar">
                                                            <button type="button" class="btn btn-danger"
                                                            data-dismiss="modal">Close</button>
                                                        </form>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Tanggal Bayar</th>

                                            </tr>
                                            @foreach ($pembayaran as $d)
                                                <tr>
                                                    <th>{{ $d->bulan_dibayar }}</th>
                                                    <td>{{ $d->tahun_dibayar }}</td>
                                                    <th>{{ $d->tgl_bayar }}</th>

                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @else
                                Tidak Ada Data
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
