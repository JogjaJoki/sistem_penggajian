@extends('admin.layout.app')
@section('content')
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
                            <h3 class="card-title">Data Gaji Saya</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Nama Karyawan</th>
                                        <th>Bagian</th>
                                        <th>Upah Lembur</th>
                                        <th>Tunjangan</th>
                                        <th>Potongan Absensi</th>
                                        <th>Gaji Kotor</th>
                                        <th>Gaji Bersih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gaji as $index => $row)
                                        <tr>
                                            <td>{{ ++$index }}</td>
                                            <td>{{ $row->created_at->format('M') }}</td>
                                            <td>{{ $row->created_at->format('Y') }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->user->bagian->name }}</td>
                                            <td>{{ $row->uang_lembur }}</td>
                                            <td>{{ $row->tunjangan }}</td>
                                            <td>{{ $row->potongan_absensi }}</td>
                                            <td>{{ $row->gaji_kotor }}</td>
                                            <td>{{ $row->gaji_bersih }}</td>
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
