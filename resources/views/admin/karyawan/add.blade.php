@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Tambah Data Karyawan</h3>
                        </div>
                        @if (session('nis-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('nis-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.karyawan.create') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <select name="bagian_id" class="form-control" id="">
                                        @foreach($bagian as $d)
                                            @if($d->name != 'Owner')
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nama ..." required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email ..." required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.karyawan.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
