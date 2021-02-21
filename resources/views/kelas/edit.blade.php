@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">Kelas</div>

                    <div class="card-body">
                        <form action="{{ route('kelas.prosesedit', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Kelas</label>
                                <input type="text" class="form-control" name="namakelas" value="{{ $data->nama_kelas }}">
                            </div>

                            <div class="form-group">
                                <label>Jurusan</label>
                                <select name="jurusan" class="form-control">
                                    <option value="TKJ" @if($data->jurusan == 'TKJ') selected @endif>TKJ</option>
                                    <option value="RPL"  @if($data->jurusan == 'RPL') selected @endif>RPL</option>
                                    <option value="MM" @if($data->jurusan == 'MM') selected @endif>MM</option>
                                    <option value="AK" @if($data->jurusan == 'AK') selected @endif>AK</option>
                                    <option value="LAS" @if($data->jurusan == 'LAS') selected @endif>LAS</option>
                                    <option value="TBSM" @if($data->jurusan == 'TBSM') selected @endif>TBSM</option>
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
