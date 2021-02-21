@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">SPP</div>

                    <div class="card-body">
                        <!-- Button to Open the Modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            Tambah SPP
                        </button>

                        <!-- The Modal -->
                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah SPP</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="{{ route('spp.simpan') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Tahun</label>
                                                <input type="number" min="2020" max="9999" class="form-control" name="tahun">
                                            </div>

                                            <div class="form-group">
                                                <label>Nominal</label>
                                                <input type="number" min="10000" max="10000000" class="form-control" name="nominal">
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
                                <th>Tahun</th>
                                <th>Nominal</th>
                                <th>Data</th>
                            </tr>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $d->tahun }}</td>
                                <td>{{ $d->nominal }}</td>
                                <td>
                                    <a href="{{ route('spp.edit', ['id' => $d->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="{{ route('spp.hapus', ['id' => $d->id]) }}" class="btn btn-sm btn-danger">Hapus</a>
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
