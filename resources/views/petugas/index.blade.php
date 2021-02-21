@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">Petugas</div>

                    <div class="card-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Tambah Petugas
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah Petugas</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('petugas.simpan') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama Petugas</label>
                                                <input type="text" class="form-control" name="nama">
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email" class="form-control">
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
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Email</th>
                                <th>Data</th>
                            </tr>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->email }}</td>
                                <td>
                                    <a href="{{ route('petugas.edit', ['id' => $d->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('petugas.hapus', ['id' => $d->id]) }}" class="btn btn-sm btn-danger">Hapus</a>
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
