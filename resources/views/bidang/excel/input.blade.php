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

                    <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/input/exportexcel/{{$pptk == null ? 0: $pptk->id}}" type="button" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-file-excel-o"></i> Excel</a>
                </div>
            </div>
            <form class="form-horizontal" method="post" action="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/input">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Uraian Kegiatan</label>
                    <div class="col-sm-10">
                        <select name="uraiansubkegiatan" class="form-control select2">
                            @foreach ($uraian as $item)
                                <option value="{{$item->id}}">{{$item->kode_rekening}} - {{$item->nama}} - DPA : {{number_format($item->dpa)}}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label"></label>

                    <input type="hidden" class="form-control" name="pptk_id" value="{{$pptk == null ? '': $pptk->id}}">
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

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-sm">
                    <thead>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:14px; color:white">
                            <th>No</th>
                            <th>Kode Rek</th>
                            <th>Nama</th>
                            <th>DPA</th>
                            <th></th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size: 14px">
                            <td>{{$no++}}</td>
                            <td>{{$item->uraiankegiatan->kode_rekening}}</td>
                            <td>{{$item->uraiankegiatan->nama}}</td>
                            <td>{{number_format($item->uraiankegiatan->dpa)}}</td>
                            <td>
                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/input/delete/{{$item->id}}"
                                    onclick="return confirm('Yakin ingin di hapus');"
                                    class="btn btn-xs btn-outline-primary" data-toggle="tooltip" data-placement="top"
                                    title="Hapus Data"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:14px; color:white">
                            <th></th>
                            <th></th>
                            <th>Total</th>
                            <th>{{number_format($data->sum('dpa'))}}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">

            <form class="form-horizontal" method="post" action="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/updatepptk">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">SKPD</label>
                        <input type="text" class="form-control" value="{{$program->bidang->skpd->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BIDANG</label>
                        <input type="text" class="form-control" value="{{$program->bidang->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">PROGRAM</label>
                        <input type="text" class="form-control" value="{{$program->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KEGIATAN</label>
                        <input type="text" class="form-control" value="{{$kegiatan->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NAMA SEKRETARIS/KABID</label>
                        <input type="text" class="form-control" name="nama_kabid" value="{{$pptk == null ? '': $pptk->nama_kabid}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP SEKRETARIS/KABID</label>
                        <input type="text" class="form-control" name="nip_kabid" value="{{$pptk == null ? '': $pptk->nip_kabid}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NAMA PPTK</label>
                        <input type="text" class="form-control" name="nama_pptk" value="{{$pptk == null ? '': $pptk->nama_pptk}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">NIP PPTK</label>
                        <input type="text" class="form-control" name="nip_pptk" value="{{$pptk == null ? '': $pptk->nip_pptk}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TGL PELAPORAN</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BULAN</label>
                        <input type="text" class="form-control" name="pelaporan_bulan" value="{{$pptk == null ? '': $pptk->pelaporan_bulan}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TANGGAL</label>
                        <input type="text" class="form-control" name="pelaporan_tanggal" value="{{$pptk == null ? '': $pptk->pelaporan_tanggal}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">KONDISI RFK</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">BULAN</label>
                        <input type="text" class="form-control" name="kondisi_bulan" value="{{$pptk == null ? '': $pptk->kondisi_bulan}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">TANGGAL</label>
                        <input type="text" class="form-control" name="kondisi_tanggal" value="{{$pptk == null ? '': $pptk->kondisi_tanggal}}" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="pptk_id" value="{{$pptk == null ? '': $pptk->id}}">
                        <button type="submit" class="btn btn-block btn-primary" name="button" value="{{$pptk == null ? 'save':'update'}}"><i class="fas fa-save"></i>UPDATE</button>
                    </div>
                </div>
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