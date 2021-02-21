@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">Kelas</div>

                    <div class="card-body">
                        <form action="{{ route('siswa.prosesedit', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input type="text" class="form-control" name="namasiswa" value="{{ $data->name }}">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="emailsiswa" value="{{ $data->email }}">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <label>Nomor Induk Siswa Nasional</label>
                                <input type="text" class="form-control" name="nisn" value="{{ App\Models\Siswa::where('id_user', $data->id)->first()->nisn }}">
                            </div>

                            <div class="form-group">
                                <label>NIS</label>
                                <input type="text" class="form-control" name="nis" value="{{ App\Models\Siswa::where('id_user', $data->id)->first()->nis }}">
                            </div>

                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <select class="form-control" name="kelas">
                                    @foreach (App\Models\Kelas::all() as $k)
                                        <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control">{{ App\Models\Siswa::where('id_user', $data->id)->first()->alamat }}</textarea>
                            </div>

                            <div class="form-group">
                                <label>TLP</label>
                                <input type="text" class="form-control" name="tlp" value="{{ App\Models\Siswa::where('id_user', $data->id)->first()->no_tlp }}">
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
    </div>
@endsection
