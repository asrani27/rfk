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
    <div class="col-lg-12">
        <div class="card card-widget">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="/admin/dist/img/avatar5.png" alt="User Image">
                    <span class="username"><a href="#">Hi, {{Auth::user()->name}}</a></span>
                    <span class="description">SELAMAT DATANG DI APLIKASI RFK</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                Pengaturan Penginputan
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <tbody>
                        <tr>
                            <td>Penginputan RFK Murni</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" {{$murni==0 ?'':'checked'}}>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </td>
                            <td>
                                @if ($murni==0)
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-murni"><i class="fas fa-folder-open"></i>
                                    BUKA</button>
                                @else
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-murni2"><i class="fas fa-folder"></i>
                                    TUTUP</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Pergeseran RFK</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" {{$pergeseran==0
                                        ?'':'checked'}}>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </td>
                            <td>
                                @if ($pergeseran==0)
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-pergeseran"><i class="fas fa-folder-open"></i>
                                    BUKA</button>
                                @else
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-pergeseran2"><i class="fas fa-folder"></i>
                                    TUTUP</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Perubahan RFK</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" {{$perubahan==0 ?'':'checked'}}>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </td>
                            <td>
                                @if ($perubahan==0)
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-perubahan"><i class="fas fa-folder-open"></i>
                                    BUKA</button>
                                @else
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-perubahan2"><i class="fas fa-folder"></i>
                                    TUTUP</button>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Realisasi RFK</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" {{$realisasi==0 ?'':'checked'}}>
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </td>
                            <td>
                                @if ($realisasi==0)
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-realisasi"><i class="fas fa-folder-open"></i>
                                    BUKA</button>
                                @else
                                <button type="button" class="btn btn-xs btn-primary" data-toggle="modal"
                                    data-target="#modal-realisasi2"><i class="fas fa-folder"></i>
                                    TUTUP</button>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                Log Buka Tutup Data
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-sm">
                    <thead>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:12px; color:white">
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no =1;
                        @endphp
                        @foreach ($log as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->tahun}}</td>
                            <td>{{$item->nama}}
                                @if ($item->nama == 'pergeseran')
                                Ke : {{$item->ke}}
                                @else
                                {{$item->ke}}
                                @endif
                            </td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<div class="modal fade" id="modal-murni">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-center" style="padding: 10px">
                <h5 class="modal-title text-center">BUKA RFK MURNI</h5>
            </div>
            <div class="modal-body">
                <p>KETIK "BUKA" di bawah kolom ini</p>
                <form method="get" action="/berandaskpd/murni">
                    @csrf
                    <input type="text" class="form-control" name="murni" value="" required><br />

                    <button type="submit" class="btn btn-sm btn-block bg-gradient-primary">BUKA</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-murni2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-center" style="padding: 10px">
                <h5 class="modal-title text-center">TUTUP RFK MURNI</h5>
            </div>
            <div class="modal-body">
                <p>KETIK "TUTUP" di bawah kolom ini</p>
                <form method="get" action="/berandaskpd/murni">
                    @csrf
                    <input type="text" class="form-control" name="murni" value="" required><br />

                    <button type="submit" class="btn btn-sm btn-block bg-gradient-primary">TUTUP</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-pergeseran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-center" style="padding: 10px">
                <h5 class="modal-title text-center">BUKA RFK PERGESERAN</h5>
            </div>
            <div class="modal-body">
                <p>KETIK "BUKA" di bawah kolom ini</p>
                <form method="get" action="/berandaskpd/pergeseran">
                    @csrf
                    <input type="text" class="form-control" name="pergeseran" value="" required><br />

                    <button type="submit" class="btn btn-sm btn-block bg-gradient-primary">BUKA</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-pergeseran2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-center" style="padding: 10px">
                <h5 class="modal-title text-center">TUTUP RFK PERGESERAN</h5>
            </div>
            <div class="modal-body">
                <p>KETIK "TUTUP" di bawah kolom ini</p>
                <form method="get" action="/berandaskpd/pergeseran">
                    @csrf
                    <input type="text" class="form-control" name="pergeseran" value="" required><br />

                    <button type="submit" class="btn btn-sm btn-block bg-gradient-primary">TUTUP</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-realisasi">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-center" style="padding: 10px">
                <h5 class="modal-title text-center">BUKA REALISASI</h5>
            </div>
            <div class="modal-body">
                <p>KETIK "BUKA" di bawah kolom ini</p>
                <form method="get" action="/berandaskpd/realisasi">
                    @csrf
                    <input type="text" class="form-control" name="realisasi" value="" required><br />

                    <button type="submit" class="btn btn-sm btn-block bg-gradient-primary">BUKA</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-realisasi2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-center" style="padding: 10px">
                <h5 class="modal-title text-center">TUTUP REALISASI</h5>
            </div>
            <div class="modal-body">
                <p>KETIK "TUTUP" di bawah kolom ini</p>
                <form method="get" action="/berandaskpd/realisasi">
                    @csrf
                    <input type="text" class="form-control" name="realisasi" value="" required><br />

                    <button type="submit" class="btn btn-sm btn-block bg-gradient-primary">TUTUP</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@push('js')

@endpush