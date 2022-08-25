@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
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
                <form method="get" action="/skpd/bidang/riwayat/kegiatan/search">
                    @csrf
                    <div class="form-group">
                        <select class="form-control select2" name="uraian_id" required>
                            <option value="">-Sub Kegiatan -  Uraian Kegiatan</option>
                            @foreach ($select as $item)
                            <option value="{{$item->id}}">{{$item->subkegiatan->nama}} - {{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-sm bg-gradient-primary">TAMPILKAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@if ($data != null)
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                RIWAYAT PERUBAHAN KEGIATAN
            </div>
            <div class="card-body table-responsive" style="width: 100%">
                <table id="example" class="table table-bordered table-sm">
                    <thead>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:12px; color:white">
                            <th>No</th>
                            <th style="width: 20%">Kode Rekening/Uraian Kegiatan</th>
                            <th>Jenis</th>
                            <th>DPA</th>
                            <th>RFK</th>
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
                            <td>{{$item->kode_rekening}}<br />{{$item->nama}}</td>
                            <td>{{$item->status == null ? 'MURNI' : 'PERGESERAN KE : '. $item->status}}</td>
                            <td>{{number_format($item->dpa)}}</td>
                            <td>
                                Renc.Keuangan <br />
                                Real.Keuangan<br />
                                Renc. Fisik<br />
                                Real Fisik
                            </td>
                            <td>
                                {{number_format($item->p_januari_keuangan)}} <br />
                                {{number_format($item->r_januari_keuangan)}} <br />
                                {{$item->p_januari_fisik}} <br />
                                {{number_format($item->r_januari_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_februari_keuangan)}} <br />
                                {{number_format($item->r_februari_keuangan)}} <br />
                                {{$item->p_februari_fisik}} <br />
                                {{number_format($item->r_februari_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_maret_keuangan)}} <br />
                                {{number_format($item->r_maret_keuangan)}} <br />
                                {{$item->p_maret_fisik}} <br />
                                {{number_format($item->r_maret_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_april_keuangan)}} <br />
                                {{number_format($item->r_april_keuangan)}} <br />
                                {{$item->p_april_fisik}} <br />
                                {{number_format($item->r_april_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_mei_keuangan)}} <br />
                                {{number_format($item->r_mei_keuangan)}} <br />
                                {{$item->p_mei_fisik}} <br />
                                {{number_format($item->r_mei_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_juni_keuangan)}} <br />
                                {{number_format($item->r_juni_keuangan)}} <br />
                                {{$item->p_juni_fisik}} <br />
                                {{number_format($item->r_juni_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_juli_keuangan)}} <br />
                                {{number_format($item->r_juli_keuangan)}} <br />
                                {{($item->p_juli_fisik)}} <br />
                                {{number_format($item->r_juli_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_agustus_keuangan)}} <br />
                                {{number_format($item->r_agustus_keuangan)}} <br />
                                {{($item->p_agustus_fisik)}} <br />
                                {{number_format($item->r_agustus_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_september_keuangan)}} <br />
                                {{number_format($item->r_september_keuangan)}} <br />
                                {{($item->p_september_fisik)}} <br />
                                {{number_format($item->r_september_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_oktober_keuangan)}} <br />
                                {{number_format($item->r_oktober_keuangan)}} <br />
                                {{($item->p_oktober_fisik)}} <br />
                                {{number_format($item->r_oktober_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_november_keuangan)}} <br />
                                {{number_format($item->r_november_keuangan)}} <br />
                                {{($item->p_november_fisik)}} <br />
                                {{number_format($item->r_november_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_desember_keuangan)}} <br />
                                {{number_format($item->r_desember_keuangan)}} <br />
                                {{($item->p_desember_fisik)}} <br />
                                {{number_format($item->r_desember_fisik)}}
                            </td>
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
<!-- Select2 -->
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
</script>
@endpush