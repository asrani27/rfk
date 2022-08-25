@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
@endpush
@section('title')
<strong>BERANDA</strong>
@endsection
@section('content')
<br />
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">GANTI PASSWORD</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="post" action="/gantipass">
                @csrf
                <div class="card-body" style="display: block;">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">USERNAME</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" value="{{Auth::user()->username}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">PASSWORD BARU</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">MASUKKAN PASSWORD BARU</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="confirm_password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">UPDATE</button><br />
                </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection

@push('js')

@endpush