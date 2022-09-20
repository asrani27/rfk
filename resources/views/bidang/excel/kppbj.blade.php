@extends('layouts.app')
@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Select2 -->
<link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}">
                    <strong><i class="fas fa-file mr-1"></i> Bulan</strong>
                </a>
                <p class="text-muted">
                    {{convertBulan($bulan)}}
                </p>
                <hr>
                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}">
                    <strong><i class="fas fa-file mr-1"></i> Jenis</strong>
                </a>
                <p class="text-muted">
                    KPPBJ
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">KPPBJ</h3>
                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <table id="example1" class="table table-bordered table-sm">
                    <thead>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:12px; color:white; text-align:center">
                            <th>No</th>
                            <th>Nama Pekerjaan</th>
                            <th>Jenis Pengadaan B/J</th>
                            <th>Metode Pemilihan Penyedia</th>
                            <th>Pagu (Rp)</th>
                            <th>Progress</th>
                            <th>Rencana Berikutnya</th>
                            <th>Realisasi (Rp)</th>
                            <th>Data Kontrak</th>
                            <th>Data Serah Terima</th>
                            <th></th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size: 12px">
                            <td>{{$no++}}</td>
                            <td>{{$item->t_input->uraiankegiatan->nama}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->metode}}</td>
                            <td>{{number_format($item->t_input->uraiankegiatan->dpa)}}</td>
                            <td>{{$item->progress}}</td>
                            <td>{{$item->rencana}}</td>
                            <td>-</td>
                            <td>{!!$item->data_kontrak!!}</td>
                            <td>{!!$item->data_serah_terima!!}</td>
                            
                            <td>
                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/kppbj/delete/{{$item->id}}"
                                    onclick="return confirm('Yakin ingin di hapus');"
                                    class="btn btn-xs btn-outline-primary" data-toggle="tooltip" data-placement="top"
                                    title="Hapus Data"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">FORM KPPBJ</h3>
                <div class="card-tools">
                </div>
            </div>
            <form class="form-horizontal" method="post" action="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/kppbj">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Uraian Pekerjaan</label>
                    <div class="col-sm-10">
                        <select name="t_input_id" class="form-control select2">
                            @foreach ($uraian as $item)
                                <option value="{{$item->id}}">{{$item->uraiankegiatan->kode_rekening}} - {{$item->uraiankegiatan->nama}} - DPA : {{number_format($item->uraiankegiatan->dpa)}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="deskripsi">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jenis Pengadaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="jenis" placeholder="barang" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Metode Pemilihan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="metode" placeholder="e-Purchasing" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Progress</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="progress" placeholder="" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Rencana berikutnya</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="rencana" required>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Data Kontrak</label>
                    <div class="col-sm-10">
                        <textarea id="summernote" name="data_kontrak"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Data Serah Terima</label>
                    <div class="col-sm-10">
                        <textarea id="summernote2" name="data_serah_terima"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary btn-block">Add</button>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
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
    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
 
    return false;
    return true;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
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
    
    $(document).ready(function() {
        $('#summernote').summernote();
        $('#summernote2').summernote();
    }); 
</script>

@endpush