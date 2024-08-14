@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Tunjangan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.tunjangan.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $tunjangan->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" value="{{ $tunjangan->name }}" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Rate (Rupiah)</label>
                                    <input type="number" value="{{ $tunjangan->rate }}" step="1" name="rate" class="form-control" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.tunjangan.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
