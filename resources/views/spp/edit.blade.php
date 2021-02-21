@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header bg-dark text-white">SPP</div>

                    <div class="card-body">
                        <form action="{{ route('spp.prosesedit', ['id' => $data->id]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Tahun</label>
                                <input type="number" min="2020" class="form-control" name="tahun" value="{{ $data->tahun }}">
                            </div>

                            <div class="form-group">
                                <label>Nominal</label>
                                <input type="number" min="10000" class="form-control" name="nominal" value="{{ $data->nominal }}">
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
