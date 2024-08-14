@extends('admin.layout.app')
@section('content')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Absensi</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.absensi.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $absensi->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Karwayan</label>
                                    <select name="user_id" class="form-control" id="">
                                        @foreach($karyawan as $d)
                                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>In</label>
                                    <input name="in" value="{{ $absensi->in->format('H:i') }}" class="form-control timepicker" required>
                                </div>
                                <div class="form-group">
                                    <label>Out</label>
                                    <input name="out" value="{{ $absensi->out != null ? $absensi->out->format('H:i') : '' }}" class="form-control timepicker">
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <input name="keterangan" value="{{ $absensi->keterangan }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Denda</label>
                                    <input name="denda" value="{{ $absensi->denda }}" class="form-control">
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.absensi.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $('.timepicker').timepicker({
            timeFormat: 'h:mm',
            interval: 1,
            startTime: '5:00am',
            maxTime: '16:00pm',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endsection
