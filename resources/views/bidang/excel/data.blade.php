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
                <strong><i class="fas fa-file mr-1"></i> Excel</strong>
                <p class="text-muted">
                    Data Untuk Di Export
                </p>
                <hr>
                <strong><i class="fas fa-file mr-1"></i> Bulan</strong>
                <p class="text-muted">
                    {{convertBulan($bulan)}}
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">PILIH JENIS</h3>
                <div class="card-tools">
                </div>
            </div>
            <div class="card-body">
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/suratpengantar" class="btn bg-gradient-primary">SURAT PENGANTAR</a>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/rfk" class="btn bg-gradient-primary">RFK</a>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/kppbj" class="btn bg-gradient-primary">KPPBJ</a>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/m" class="btn bg-gradient-primary">M</a>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/pbj" class="btn bg-gradient-primary">PBJ</a>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/v" class="btn bg-gradient-primary">V</a>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/fiskeu" class="btn bg-gradient-primary">FIS KEU</a>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/input" class="btn bg-gradient-primary">INPUT</a>

            </div>
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