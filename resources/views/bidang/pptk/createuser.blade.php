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
                <h3 class="card-title">BUAT USER PPTK</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="post" action="/skpd/bidang/pptk/createuser/{{$data->id}}">
                @csrf
                <div class="card-body" style="display: block;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NAMA PPTK</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{$data->nama_pptk}}" readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">USERNAME</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">PASSWORD</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="password" id="password" required>
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
<script>
    $('#username').keypress(function( e ) {
    if(e.which === 32) 
        return false;
});
$('#password').keypress(function( e ) {
    if(e.which === 32) 
        return false;
});
</script>
@endpush