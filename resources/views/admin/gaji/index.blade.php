@extends('admin.layout.app')
@section('content')
    <div class="container-fluid my-3 d-flex justify-content-between px-3" style="padding-left: 1%;">
        <a href="{{ route('admin.gaji.index') }}" class="btn btn-primary">Generate Gaji Bulan Ini</a>  
        <a href="{{ route('admin.gaji.renew') }}" class="btn btn-primary">Perbarui Gaji Bulan Ini</a>  
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
                            <h3 class="card-title">Data Gaji</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Bagian</th>
                                        <th>Upah Lembur</th>
                                        <th>Potongan Absensi</th>
                                        <th>Gaji Bersih</th>
                                        <th>Gaji Kotor</th>
                                        <th>Total Gaji</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $index => $row)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $row->created_at->format('M') }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->user->bagian->name }}</td>
                                            <td>{{ $row->uang_lembur }}</td>
                                            <td>{{ $row->potongan_absensi }}</td>
                                            <td>{{ $row->gaji_bersih }}</td>
                                            <td>{{ $row->gaji_kotor }}</td>
                                            <td>{{ $row->gaji_kotor - $row->potongan_absensi + $row->uang_lembur }}</td>
                                            <td>
                                                <a href="{{ route('admin.gaji.edit', ['id' => $row->id]) }}"
                                                    class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.gaji.delete', ['id' => $row->id]) }}"
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
