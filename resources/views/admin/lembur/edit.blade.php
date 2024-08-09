@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Lembur</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.lembur.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $lembur->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Durasi (Jam)</label>
                                    <input type="number" value="{{ $lembur->durasi }}" step="1" name="durasi" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Rate (Rupiah)</label>
                                    <input type="number" value="{{ $lembur->rate }}" step="1" name="rate" class="form-control" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.lembur.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
