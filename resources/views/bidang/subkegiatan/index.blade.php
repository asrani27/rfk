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
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">DATA SUB KEGIATAN</h3>
                <div class="card-tools">

                    @if (Auth::user()->bidang->skpd->murni == 1)
                    <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/add" type="button"
                        class="btn bg-gradient-blue btn-xs">
                        <i class="fas fa-plus"></i> Tambah Sub Kegiatan</a>
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
                            <th>Sub Kegiatan</th>
                            <th>Aksi</th>
                            <th>Export Data</th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size: 12px">
                            <td>{{$no++}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/uraian/{{$item->id}}"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-list"></i> Uraian
                                    Kegiatan</a>

                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/edit/{{$item->id}}"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-edit"></i></a>

                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/delete/{{$item->id}}"
                                    onclick="return confirm('Yakin ingin di hapus');"
                                    class="btn btn-xs btn-outline-primary"><i class="fas fa-trash"></i></a>
                            </td>
                            <td>
                                <a href="/export/januari/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs">JANUARI</a>
                                <a href="/export/februari/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs">FEBRUARI</a>
                                <a href="/export/maret/{{$item->id}}" class="btn btn-outline-primary btn-xs">MARET</a>
                                <a href="/export/april/{{$item->id}}" class="btn btn-outline-primary btn-xs">APRIL</a>
                                <a href="/export/mei/{{$item->id}}" class="btn btn-outline-primary btn-xs">MEI</a>
                                <a href="/export/juni/{{$item->id}}" class="btn btn-outline-primary btn-xs">JUNI</a>
                                <a href="/export/juli/{{$item->id}}" class="btn btn-outline-primary btn-xs">JULI</a>
                                <a href="/export/agustus/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs">AGUSTUS</a>
                                <a href="/export/september/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs">SEPTEMBER</a>
                                <a href="/export/oktober/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs">OKTOBER</a>
                                <a href="/export/november/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs">NOVEMBER</a>
                                <a href="/export/desember/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs">DESEMBER</a>
                                {{-- <a href="/excel/sp/{{$program_id}}/{{$kegiatan_id}}/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs"><i class="fas fa-file-excel"></i> SR
                                    PENGANTAR</a>
                                <a href="/excel/rfk/{{$program_id}}/{{$kegiatan_id}}/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs"><i class="fas fa-file-excel"></i> RFK</a>
                                <a href="/excel/fiskeu/{{$program_id}}/{{$kegiatan_id}}/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs"><i class="fas fa-file-excel"></i> FIS KEU</a>
                                <a href="/excel/input/{{$program_id}}/{{$kegiatan_id}}/{{$item->id}}"
                                    class="btn btn-outline-primary btn-xs"><i class="fas fa-file-excel"></i> INPUT</a>
                                --}}
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