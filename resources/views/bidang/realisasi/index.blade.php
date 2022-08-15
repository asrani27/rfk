@extends('layouts.app')
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
<br />

<div class="row">
    <div class="col-md-12">
        <div class="card card-primary text-sm">
            <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-calendar mr-1"></i> Tahun</strong>
                <p class="text-muted">{{$program->tahun}}</p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Program</strong>
                <p class="text-muted">
                    {{$program->nama}}
                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Kegiatan</strong>
                <p class="text-muted">
                    {{$kegiatan->nama}}
                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Sub Kegiatan</strong>
                <p class="text-muted">
                    {{$subkegiatan->nama}}
                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Kode Rekening</strong>
                <p class="text-muted">
                    {{$uraian->kode_rekening}}
                </p>
                <hr>
                <strong><i class="fas fa-book mr-1"></i> Uraian Kegiatan</strong>
                <p class="text-muted">
                    {{$uraian->nama}}
                </p>
                <hr>
                <strong><i class="fas fa-money-bill mr-1"></i> DPA</strong>
                <p class="text-muted">
                    Rp. {{number_format($uraian->dpa)}}
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">RENCANA ANGGARAN</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="row text-center">
                            <div class="col-6">
                                RENCANA KEUANGAN
                            </div>
                            <div class="col-6">
                                RENCANA FISIK
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Januari</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_januari_keuangan" id="januari_keuangan"
                                    value="{{number_format($uraian->p_januari_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_januari_fisik" id="januari_fisik"
                                    value="{{number_format($uraian->p_januari_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Februari</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_februari_keuangan"
                                    id="februari_keuangan"
                                    value="{{number_format($uraian->p_februari_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_februari_fisik" id="februari_fisik"
                                    value="{{number_format($uraian->p_februari_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Maret</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_maret_keuangan" id="maret_keuangan"
                                    value="{{number_format($uraian->p_maret_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_maret_fisik" id="maret_fisik"
                                    value="{{number_format($uraian->p_maret_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">April</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_april_keuangan" id="april_keuangan"
                                    value="{{number_format($uraian->p_april_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_april_fisik" id="april_fisik"
                                    value="{{number_format($uraian->p_april_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mei</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_mei_keuangan" id="mei_keuangan"
                                    value="{{number_format($uraian->p_mei_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_mei_fisik" id="mei_fisik"
                                    value="{{number_format($uraian->p_mei_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Juni</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_juni_keuangan" id="juni_keuangan"
                                    value="{{number_format($uraian->p_juni_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_juni_fisik" id="juni_fisik"
                                    value="{{number_format($uraian->p_juni_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Juli</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_juli_keuangan" id="juli_keuangan"
                                    value="{{number_format($uraian->p_juli_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_juli_fisik" id="juli_fisik"
                                    value="{{number_format($uraian->p_juli_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Agustus</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_agustus_keuangan" id="agustus_keuangan"
                                    value="{{number_format($uraian->p_agustus_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_agustus_fisik" id="agustus_fisik"
                                    value="{{number_format($uraian->p_agustus_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">September</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_september_keuangan"
                                    id="september_keuangan"
                                    value="{{number_format($uraian->p_september_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_september_fisik" id="september_fisik"
                                    value="{{number_format($uraian->p_september_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Oktober</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_oktober_keuangan" id="oktober_keuangan"
                                    value="{{number_format($uraian->p_oktober_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_oktober_fisik" id="oktober_fisik"
                                    value="{{number_format($uraian->p_oktober_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">November</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_november_keuangan"
                                    id="november_keuangan"
                                    value="{{number_format($uraian->p_november_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_november_fisik" id="november_fisik"
                                    value="{{number_format($uraian->p_november_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Desember</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_desember_keuangan"
                                    id="desember_keuangan"
                                    value="{{number_format($uraian->p_desember_keuangan, 0, '.', '.')}}" readonly>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="p_desember_fisik" id="desember_fisik"
                                    value="{{number_format($uraian->p_desember_fisik, 0, '.', '.')}}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="form-check">
                            <label class="form-check-label" id="jumlah">0</label>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">REALISASI</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post"
                action="/realisasi/{{$program_id}}/{{$kegiatan_id}}/{{$subkegiatan_id}}/{{$uraian_id}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <div class="row text-center">
                                <div class="col-6">
                                    REALISASI KEUANGAN
                                </div>
                                <div class="col-6">
                                    REALISASI FISIK
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Januari</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_januari_keuangan"
                                        id="r_januari_keuangan"
                                        value="{{number_format($uraian->r_januari_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==1 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_januari_fisik" id="r_januari_fisik"
                                        value="{{number_format($uraian->r_januari_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==1 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Februari</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_februari_keuangan"
                                        id="r_februari_keuangan"
                                        value="{{number_format($uraian->r_februari_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==2 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_februari_fisik"
                                        id="r_februari_fisik"
                                        value="{{number_format($uraian->r_februari_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==2 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Maret</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_maret_keuangan"
                                        id="r_maret_keuangan"
                                        value="{{number_format($uraian->r_maret_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==3 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_maret_fisik" id="r_maret_fisik"
                                        value="{{number_format($uraian->r_maret_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==3 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">April</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_april_keuangan"
                                        id="r_april_keuangan"
                                        value="{{number_format($uraian->r_april_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==4 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_april_fisik" id="r_april_fisik"
                                        value="{{number_format($uraian->r_april_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==4 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mei</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_mei_keuangan" id="r_mei_keuangan"
                                        value="{{number_format($uraian->r_mei_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==5 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_mei_fisik" id="r_mei_fisik"
                                        value="{{number_format($uraian->r_mei_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==5 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Juni</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_juni_keuangan" id="r_juni_keuangan"
                                        value="{{number_format($uraian->r_juni_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==6 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_juni_fisik" id="r_juni_fisik"
                                        value="{{number_format($uraian->r_juni_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==6 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Juli</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_juli_keuangan" id="r_juli_keuangan"
                                        value="{{number_format($uraian->r_juli_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==7 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_juli_fisik" id="r_juli_fisik"
                                        value="{{number_format($uraian->r_juli_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==7 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Agustus</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_agustus_keuangan"
                                        id="r_agustus_keuangan"
                                        value="{{number_format($uraian->r_agustus_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==8 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_agustus_fisik" id="r_agustus_fisik"
                                        value="{{number_format($uraian->r_agustus_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==8 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">September</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_september_keuangan"
                                        id="r_september_keuangan"
                                        value="{{number_format($uraian->r_september_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==9 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_september_fisik"
                                        id="r_september_fisik"
                                        value="{{number_format($uraian->r_september_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==9 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Oktober</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_oktober_keuangan"
                                        id="r_oktober_keuangan"
                                        value="{{number_format($uraian->r_oktober_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==10 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_oktober_fisik" id="r_oktober_fisik"
                                        value="{{number_format($uraian->r_oktober_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==10 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">November</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_november_keuangan"
                                        id="r_november_keuangan"
                                        value="{{number_format($uraian->r_november_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==11 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_november_fisik"
                                        id="r_november_fisik"
                                        value="{{number_format($uraian->r_november_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==11 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Desember</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_desember_keuangan"
                                        id="r_desember_keuangan"
                                        value="{{number_format($uraian->r_desember_keuangan, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==12 ? '' :'readonly'}}>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" name="r_desember_fisik"
                                        id="r_desember_fisik"
                                        value="{{number_format($uraian->r_desember_fisik, 0, '.', '.')}}" required
                                        {{$bulanrealisasi==12 ? '' :'readonly'}}>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">SISA</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-6 text-center text-bold">
                                    {{number_format($sisakeu)}}
                                </div>
                                <div class="col-6 text-center text-bold">
                                    {{-- {{number_format($sisafis)}} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <div class="form-check">
                                <label class="form-check-label" id="jumlah">0</label>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-info">SIMPAN</button>
                    <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/uraian/{{$subkegiatan_id}}"
                        class="btn btn-default float-right">KEMBALI</a>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')

<!-- DataTables  & Plugins -->
<script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/admin/plugins/jszip/jszip.min.js"></script>
<script src="/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
</script>

<script>
    var januari_keuangan = document.getElementById("januari_keuangan");
        januari_keuangan.addEventListener("keyup", function(e) {
        januari_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var februari_keuangan = document.getElementById("februari_keuangan");
        februari_keuangan.addEventListener("keyup", function(e) {
        februari_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var maret_keuangan = document.getElementById("maret_keuangan");
        maret_keuangan.addEventListener("keyup", function(e) {
        maret_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var april_keuangan = document.getElementById("april_keuangan");
        april_keuangan.addEventListener("keyup", function(e) {
        april_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var mei_keuangan = document.getElementById("mei_keuangan");
        mei_keuangan.addEventListener("keyup", function(e) {
        mei_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var juni_keuangan = document.getElementById("juni_keuangan");
        juni_keuangan.addEventListener("keyup", function(e) {
        juni_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var juli_keuangan = document.getElementById("juli_keuangan");
        juli_keuangan.addEventListener("keyup", function(e) {
        juli_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var agustus_keuangan = document.getElementById("agustus_keuangan");
        agustus_keuangan.addEventListener("keyup", function(e) {
        agustus_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var september_keuangan = document.getElementById("september_keuangan");
        september_keuangan.addEventListener("keyup", function(e) {
        september_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var oktober_keuangan = document.getElementById("oktober_keuangan");
        oktober_keuangan.addEventListener("keyup", function(e) {
        oktober_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var november_keuangan = document.getElementById("november_keuangan");
        november_keuangan.addEventListener("keyup", function(e) {
        november_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var desember_keuangan = document.getElementById("desember_keuangan");
        desember_keuangan.addEventListener("keyup", function(e) {
        desember_keuangan.value = formatRupiah(this.value, "Rp. ");
    });

    
    var januari_fisik = document.getElementById("januari_fisik");
        januari_fisik.addEventListener("keyup", function(e) {
        januari_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var februari_fisik = document.getElementById("februari_fisik");
        februari_fisik.addEventListener("keyup", function(e) {
        februari_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var maret_fisik = document.getElementById("maret_fisik");
        maret_fisik.addEventListener("keyup", function(e) {
        maret_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var april_fisik = document.getElementById("april_fisik");
        april_fisik.addEventListener("keyup", function(e) {
        april_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var mei_fisik = document.getElementById("mei_fisik");
        mei_fisik.addEventListener("keyup", function(e) {
        mei_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var juni_fisik = document.getElementById("juni_fisik");
        juni_fisik.addEventListener("keyup", function(e) {
        juni_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var juli_fisik = document.getElementById("juli_fisik");
        juli_fisik.addEventListener("keyup", function(e) {
        juli_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var agustus_fisik = document.getElementById("agustus_fisik");
        agustus_fisik.addEventListener("keyup", function(e) {
        agustus_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var september_fisik = document.getElementById("september_fisik");
        september_fisik.addEventListener("keyup", function(e) {
        september_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var oktober_fisik = document.getElementById("oktober_fisik");
        oktober_fisik.addEventListener("keyup", function(e) {
        oktober_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var november_fisik = document.getElementById("november_fisik");
        november_fisik.addEventListener("keyup", function(e) {
        november_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var desember_fisik = document.getElementById("desember_fisik");
        desember_fisik.addEventListener("keyup", function(e) {
        desember_fisik.value = formatRupiah(this.value, "Rp. ");
    });
/* Fungsi formatRupiah */

    var r_januari_keuangan = document.getElementById("r_januari_keuangan");
        r_januari_keuangan.addEventListener("keyup", function(e) {
        r_januari_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_februari_keuangan = document.getElementById("r_februari_keuangan");
        r_februari_keuangan.addEventListener("keyup", function(e) {
        r_februari_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_maret_keuangan = document.getElementById("r_maret_keuangan");
    r_maret_keuangan.addEventListener("keyup", function(e) {
        r_maret_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_april_keuangan = document.getElementById("r_april_keuangan");
    r_april_keuangan.addEventListener("keyup", function(e) {
        r_april_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_mei_keuangan = document.getElementById("r_mei_keuangan");
    r_mei_keuangan.addEventListener("keyup", function(e) {
        r_mei_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_juni_keuangan = document.getElementById("r_juni_keuangan");
    r_juni_keuangan.addEventListener("keyup", function(e) {
        r_juni_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_juli_keuangan = document.getElementById("r_juli_keuangan");
    r_juli_keuangan.addEventListener("keyup", function(e) {
        r_juli_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_agustus_keuangan = document.getElementById("r_agustus_keuangan");
    r_agustus_keuangan.addEventListener("keyup", function(e) {
        r_agustus_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_september_keuangan = document.getElementById("r_september_keuangan");
    r_september_keuangan.addEventListener("keyup", function(e) {
        r_september_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_oktober_keuangan = document.getElementById("r_oktober_keuangan");
    r_oktober_keuangan.addEventListener("keyup", function(e) {
        r_oktober_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_november_keuangan = document.getElementById("r_november_keuangan");
    r_november_keuangan.addEventListener("keyup", function(e) {
        r_november_keuangan.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_desember_keuangan = document.getElementById("r_desember_keuangan");
    r_desember_keuangan.addEventListener("keyup", function(e) {
        r_desember_keuangan.value = formatRupiah(this.value, "Rp. ");
    });

    
    var r_januari_fisik = document.getElementById("r_januari_fisik");
    r_januari_fisik.addEventListener("keyup", function(e) {
        r_januari_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_februari_fisik = document.getElementById("r_februari_fisik");
    r_februari_fisik.addEventListener("keyup", function(e) {
        r_februari_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_maret_fisik = document.getElementById("r_maret_fisik");
    r_maret_fisik.addEventListener("keyup", function(e) {
        r_maret_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_april_fisik = document.getElementById("r_april_fisik");
    r_april_fisik.addEventListener("keyup", function(e) {
        r_april_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_mei_fisik = document.getElementById("r_mei_fisik");
    r_mei_fisik.addEventListener("keyup", function(e) {
        r_mei_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_juni_fisik = document.getElementById("r_juni_fisik");
    r_juni_fisik.addEventListener("keyup", function(e) {
        r_juni_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_juli_fisik = document.getElementById("r_juli_fisik");
    r_juli_fisik.addEventListener("keyup", function(e) {
        r_juli_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_agustus_fisik = document.getElementById("r_agustus_fisik");
    r_agustus_fisik.addEventListener("keyup", function(e) {
        r_agustus_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_september_fisik = document.getElementById("r_september_fisik");
    r_september_fisik.addEventListener("keyup", function(e) {
        r_september_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_oktober_fisik = document.getElementById("r_oktober_fisik");
    r_oktober_fisik.addEventListener("keyup", function(e) {
        r_oktober_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_november_fisik = document.getElementById("r_november_fisik");
    r_november_fisik.addEventListener("keyup", function(e) {
        r_november_fisik.value = formatRupiah(this.value, "Rp. ");
    });
    
    var r_desember_fisik = document.getElementById("r_desember_fisik");
    r_desember_fisik.addEventListener("keyup", function(e) {
        r_desember_fisik.value = formatRupiah(this.value, "Rp. ");
    });

function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? rupiah : "";
}
</script>
@endpush