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
                <h3 class="card-title">EDIT PROGRAM</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="post" action="/skpd/bidang/program/edit/{{$data->id}}">
                @csrf
                <div class="card-body" style="display: block;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">TAHUN</label>
                        <div class="col-sm-10">
                            <select name="tahun" class="form-control">
                                <option value="">-tahun-</option>
                                <option value="2022" {{$data->tahun == '2022' ? 'selected':''}}>2022
                                </option>
                                <option value="2023" {{$data->tahun == '2023' ? 'selected':''}}>2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">NAMA PROGRAM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
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