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
                <hr>
                <strong><i class="fas fa-file mr-1"></i> Jenis</strong>
                <p class="text-muted">
                    Input
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">INPUT</h3>
                <div class="card-tools">
                </div>
            </div>
            <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Uraian Kegiatan</label>
                    <div class="col-sm-10">
                        <select name="uraiansubkegiatan" class="form-control select2">
                            @foreach ($uraian as $item)
                                <option value="{{$item->id}}">{{$item->kode_rekening}} - {{$item->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Add</button>
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
@endpush