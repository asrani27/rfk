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
                <h3 class="card-title">TAMBAH PPTK</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="post" action="/skpd/bidang/pptk/add">
                @csrf
                <div class="card-body" style="display: block;">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIP SEKRETARIS/KABID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nip_kabid" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NAMA SEKRETARIS/KABID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_kabid" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NIP PPTK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nip_pptk" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">NAMA PPTK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_pptk" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">SIMPAN</button><br />
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