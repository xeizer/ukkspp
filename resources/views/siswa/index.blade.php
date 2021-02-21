@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">Siswa</div>

                    <div class="card-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Tambah Siswa
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Siswa</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('siswa.simpan') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" name="namasiswa">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="emailsiswa">
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>

                                            <div class="form-group">
                                                <label>Nomor Induk Siswa Nasional</label>
                                                <input type="text" class="form-control" name="nisn">
                                            </div>

                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input type="text" class="form-control" name="nis">
                                            </div>

                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select class="form-control" name="kelas">
                                                    @foreach (App\Models\Kelas::all() as $k)
                                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control" name="alamat"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>TLP</label>
                                                <input type="text" class="form-control" name="tlp">
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis SPP</label>
                                                <select class="form-control" name="spp">
                                                    @foreach (App\Models\Spp::all() as $k)
                                                        <option value="{{ $k->id }}">{{ $k->tahun }} | {{ $k->nominal }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group float-right">

                                                <input type="submit" class="btn btn-primary">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>NISN</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>SPP</th>
                                <th>Data</th>
                            </tr>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ App\Models\User::find($d->id_user)->name }}</td>
                                <td>{{ $d->nisn }}</td>
                                <td>{{ $d->nis }}</td>
                                <td>{{ App\Models\Kelas::find($d->id_kelas)->nama_kelas }}</td>
                                <td>{{ App\Models\Spp::find($d->id_spp)->nominal }}</td>
                                <td>
                                    <a href="{{ route('siswa.edit', ['id' => $d->id_user]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('siswa.hapus', ['id' => $d->id_user]) }}" class="btn btn-sm btn-danger">Hapus</a>
                                </td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
