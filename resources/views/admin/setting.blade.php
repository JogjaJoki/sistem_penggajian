@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Tanggal Penggajian Bulanan</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.setting.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $setting->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tanggal Penggajian</label>
                                    <select name="tanggal" class="form-control" id="">
                                        @for($i=1; $i<=31; $i++)
                                            <option value="{{ $i }}" <?= $setting->tanggal_penggajian_bulanan == $i ? 'selected' : '' ?>>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
