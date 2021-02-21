@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">Petugas</div>

                    <div class="card-body">
                        <form action="{{ route('petugas.prosesedit', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Nama Petugas</label>
                                <input type="text" class="form-control" name="nama" value="{{ $data->name }}" >
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $data->email }}">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
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
