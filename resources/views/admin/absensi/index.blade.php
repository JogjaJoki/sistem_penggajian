@extends('admin.layout.app')
@section('content')
    <div class="container-fluid my-3 d-flex justify-content-between px-3" style="padding-left: 1%;">
        <a href="{{ route('admin.absensi.add') }}" class="btn btn-primary">Tambah Data</a>  
    </div>
    <br>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            {!! implode('', $errors->all('<li>:message</li>')) !!}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Absensi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>User</th>
                                        <th>Tanggal</th>
                                        <th>In</th>
                                        <th>Out</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absensi as $index => $row)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->created_at->format('Y:m:d') }}</td>
                                            <td>{{ $row->in->format('H:i') }}</td>
                                            <td>{{ $row->out != null ? $row->out->format('H:i') : '' }}</td>
                                            <td>{{ $row->keterangan }}</td>
                                            <td>
                                                <a href="{{ route('admin.absensi.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.absensi.delete', ['id' => $row->id]) }}"
                                                    onclick="return confirm('Are you sure?'); return false;"
                                                    class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
@endsection
