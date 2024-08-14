@extends('admin.layout.app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"> Edit Data Karyawan</h3>
                        </div>
                        @if (session('nis-warn'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('nis-warn') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.karyawan.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $karyawan->id }}" id="">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Bagian</label>
                                    <select name="bagian_id" class="form-control" id="">
                                        @foreach($bagian as $d)
                                            @if($d->name != 'Owner')
                                            <option value="{{ $d->id }}" <?= $karyawan->bagian->id == $d->id ? 'selected' : '' ?>>{{ $d->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $karyawan->name }}" class="form-control" placeholder="Nama ..." required>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $karyawan->email }}" class="form-control" placeholder="Email ..." required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <hr>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tunjangan</label>
                                    @foreach($tunjangan as $t)
                                        <div>
                                            <input type="checkbox" name="tunjangan[]" 
                                                <?php
                                                    foreach($karyawan->tunjangan as $tj){
                                                        if($tj->id == $t->id){
                                                            echo 'checked';
                                                        }
                                                    }
                                                ?>                                            
                                            value="{{ $t->id }}" id="">    {{ $t->name . " - " . $t->rate }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

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
