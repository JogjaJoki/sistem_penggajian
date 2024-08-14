@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Generate Laporan {{ $type }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.laporan.generate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="{{ $type }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Start</label>
                                    <input type="date" name="start" class="form-control" id="" required>
                                </div>
                                <div class="form-group">
                                    <label>End</label>
                                    <input type="date" name="end" class="form-control" id="" required>
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
