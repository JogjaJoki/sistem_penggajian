@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Bagian</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.bagian.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $bagian->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Bagian</label>
                                    <input type="text" name="name" value="{{ $bagian->name }}" class="form-control" placeholder="Nama Bagian" required>
                                </div>
                                <div class="form-group">
                                    <label>Gaji</label>
                                    <input type="number" name="gaji" value="{{ $bagian->gaji }}" class="form-control" placeholder="0" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.bagian.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
