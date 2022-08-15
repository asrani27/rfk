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
    <div class="col-12">
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
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">DATA URAIAN KEGIATAN</h3>
                <div class="card-tools">

                    @if (Auth::user()->bidang->skpd->murni == 1)
                    <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/uraian/{{$subkegiatan_id}}/add"
                        type="button" class="btn bg-gradient-blue btn-xs">
                        <i class="fas fa-plus"></i> Tambah Uraian Kegiatan</a>
                    @endif
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
                <table id="example1" class="table table-bordered table-sm">
                    <thead>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:12px; color:white">
                            <th>No</th>
                            <th style="width: 20%">Kode Rekening/Uraian Kegiatan</th>
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
                            <th>Aksi</th>
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
                                {{number_format($item->p_januari_fisik)}} <br />
                                {{number_format($item->r_januari_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_februari_keuangan)}} <br />
                                {{number_format($item->r_februari_keuangan)}} <br />
                                {{number_format($item->p_februari_fisik)}} <br />
                                {{number_format($item->r_februari_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_maret_keuangan)}} <br />
                                {{number_format($item->r_maret_keuangan)}} <br />
                                {{number_format($item->p_maret_fisik)}} <br />
                                {{number_format($item->r_maret_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_april_keuangan)}} <br />
                                {{number_format($item->r_april_keuangan)}} <br />
                                {{number_format($item->p_april_fisik)}} <br />
                                {{number_format($item->r_april_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_mei_keuangan)}} <br />
                                {{number_format($item->r_mei_keuangan)}} <br />
                                {{number_format($item->p_mei_fisik)}} <br />
                                {{number_format($item->r_mei_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_juni_keuangan)}} <br />
                                {{number_format($item->r_juni_keuangan)}} <br />
                                {{number_format($item->p_juni_fisik)}} <br />
                                {{number_format($item->r_juni_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_juli_keuangan)}} <br />
                                {{number_format($item->r_juli_keuangan)}} <br />
                                {{number_format($item->p_juli_fisik)}} <br />
                                {{number_format($item->r_juli_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_agustus_keuangan)}} <br />
                                {{number_format($item->r_agustus_keuangan)}} <br />
                                {{number_format($item->p_agustus_fisik)}} <br />
                                {{number_format($item->r_agustus_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_september_keuangan)}} <br />
                                {{number_format($item->r_september_keuangan)}} <br />
                                {{number_format($item->p_september_fisik)}} <br />
                                {{number_format($item->r_september_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_oktober_keuangan)}} <br />
                                {{number_format($item->r_oktober_keuangan)}} <br />
                                {{number_format($item->p_oktober_fisik)}} <br />
                                {{number_format($item->r_oktober_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_november_keuangan)}} <br />
                                {{number_format($item->r_november_keuangan)}} <br />
                                {{number_format($item->p_november_fisik)}} <br />
                                {{number_format($item->r_november_fisik)}}
                            </td>
                            <td>
                                {{number_format($item->p_desember_keuangan)}} <br />
                                {{number_format($item->r_desember_keuangan)}} <br />
                                {{number_format($item->p_desember_fisik)}} <br />
                                {{number_format($item->r_desember_fisik)}}
                            </td>
                            <td>

                                @if (Auth::user()->bidang->skpd->murni == 1)
                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/uraian/{{$subkegiatan_id}}/edit/{{$item->id}}"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-edit"></i></a>

                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/uraian/{{$subkegiatan_id}}/delete/{{$item->id}}"
                                    onclick="return confirm('Yakin ingin di hapus');"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-trash"></i></a>

                                <a href="/murni/{{$program_id}}/{{$kegiatan_id}}/{{$subkegiatan_id}}/{{$item->id}}"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-money-bill"></i> Anggaran
                                    Kas Murni</a>
                                @endif

                                @if (Auth::user()->bidang->skpd->perubahan == 1)
                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/perubahan/{{$item->id}}"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-sync"></i>
                                    Perubahan</a>
                                @endif

                                @if (Auth::user()->bidang->skpd->realisasi == 1)
                                <a href="/realisasi/{{$program_id}}/{{$kegiatan_id}}/{{$subkegiatan_id}}/{{$item->id}}"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-chart-bar"></i>
                                    Realisasi</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
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
@endpush