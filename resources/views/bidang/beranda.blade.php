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
    <div class="col-lg-12">
        <div class="card card-widget">
            <div class="card-body">
                <form method="get" action="/berandabidang/tahun">
                    @csrf
                    <div class="form-group">
                        <select class="form-control" name="tahun" required>
                            <option value="">-tahun-</option>
                            <option value="2022" {{old('tahun')=='2022' ? 'selected' :''}}>2022</option>
                            <option value="2023" {{old('tahun')=='2023' ? 'selected' :''}}>2023</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="status" required>
                            <option value="">-status-</option>
                            <option value="1" {{old('status')=='1' ? 'selected' :''}}>Murni</option>
                            <option value="2" {{old('status')=='2' ? 'selected' :''}}>Perubahan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-sm bg-gradient-primary">NEXT</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($data != null)
<div class="row">
    <div class="col-lg-12">
        <div class="card card-widget">
            <div class="card-body table-responsive" style="width: 100%">
                <table id="example1" class="table table-bordered table-sm">
                    <thead>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:12px; color:white">
                            <th>No</th>
                            <th>Kode Rekening/Uraian</th>
                            <th>Jenis</th>
                            <th>Januari</th>
                            <th>Februari</th>
                            <th>Maret</th>
                            <th>April</th>
                            <th>Mei</th>
                            <th>Juni</th>
                            <th>Juli</th>
                            <th>Agustus</th>
                            <th>September</th>
                            <th>Oktober</th>
                            <th>November</th>
                            <th>Desember</th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size: 12px">
                            <td>{{$no++}}</td>
                            <td style="width: 20%">{{$item->kode_rekening}}<br />{{$item->nama}}</td>
                            <td>Keuangan <br />Fisik</td>
                            <td>
                                {{number_format($item->p_januari_keuangan)}}
                                <br />
                                {{number_format($item->p_januari_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_februari_keuangan)}}
                                <br />
                                {{number_format($item->p_februari_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_maret_keuangan)}}
                                <br />
                                {{number_format($item->p_maret_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_april_keuangan)}}
                                <br />
                                {{number_format($item->p_april_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_mei_keuangan)}}
                                <br />
                                {{number_format($item->p_mei_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_juni_keuangan)}}
                                <br />
                                {{number_format($item->p_juni_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_juli_keuangan)}}
                                <br />
                                {{number_format($item->p_juli_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_agustus_keuangan)}}
                                <br />
                                {{number_format($item->p_agustus_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_september_keuangan)}}
                                <br />
                                {{number_format($item->p_september_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_oktober_keuangan)}}
                                <br />
                                {{number_format($item->p_oktober_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_november_keuangan)}}
                                <br />
                                {{number_format($item->p_november_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_desember_keuangan)}}
                                <br />
                                {{number_format($item->p_desember_fisik)}}
                            </td>
                            {{-- <td>{{number_format($item->jumlah)}}</td> --}}

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('js')

@endpush