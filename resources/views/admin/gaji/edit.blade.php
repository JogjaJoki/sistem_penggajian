@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Gaji</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.gaji.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $gaji->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Karyawan</label>
                                    <input type="text" value="{{ $gaji->user->name }}" name="name" readonly class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label>Potongan Absensi</label>
                                    <input type="number" value="{{ $gaji->potongan_absensi }}" name="potongan_absensi" class="form-control" id="">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.gaji.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
