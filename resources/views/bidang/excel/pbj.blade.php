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
                    PBJ
                </p>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">PBJ</h3>
                <div class="card-tools">

                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered table-sm table-responsive">
                    <thead>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:11px; color:white; text-align:center">
                            <th rowspan=2>No</th>
                            <th rowspan=2>Uraian Pekerjaan</th>
                            <th rowspan=2>Nilai DPA</th>
                            <th rowspan=2>Jenis Pengadaan</th>
                            <th colspan=3>BARANG</th>
                            <th colspan=3>JASA KONSULTASI</th>
                            <th colspan=3>PEKERJAAN KONSTRUKSI</th>
                            <th colspan=3>JASA LAINNYA</th>
                            <th colspan=3>JUMLAH</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr
                            style="background-image: linear-gradient(180deg, #268fff, #007bff); font-size:11px; color:white; text-align:center">
                            
                            <th>Belum</th>
                            <th>Sedang</th>
                            <th>Selesai</th>
                            <th>Belum</th>
                            <th>Sedang</th>
                            <th>Selesai</th>
                            <th>Belum</th>
                            <th>Sedang</th>
                            <th>Selesai</th>
                            <th>Belum</th>
                            <th>Sedang</th>
                            <th>Selesai</th>
                            <th>Belum</th>
                            <th>Sedang</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $key => $item)
                        <tr style="font-size: 12px">
                            <td>{{$no++}}</td>
                            <td>{{$item->t_input->uraiankegiatan->nama}}<br/>{{$item->deskripsi}}</td>
                            <td>{{number_format($item->t_input->uraiankegiatan->dpa)}}</td>
                            <td>{{$item->jenis}}</td>
                            <td>{{$item->b_belum}}</td>
                            <td>{{$item->b_sedang}}</td>
                            <td>{{$item->b_selesai}}</td>
                            <td>{{$item->jk_belum}}</td>
                            <td>{{$item->jk_sedang}}</td>
                            <td>{{$item->jk_selesai}}</td>
                            <td>{{$item->pk_belum}}</td>
                            <td>{{$item->pk_sedang}}</td>
                            <td>{{$item->pk_selesai}}</td>
                            <td>{{$item->jl_belum}}</td>
                            <td>{{$item->jl_sedang}}</td>
                            <td>{{$item->jl_selesai}}</td>
                            <td>{{$item->b_belum + $item->jk_belum + $item->pk_belum + $item->jl_belum}}</td>
                            <td>{{$item->b_sedang + $item->jk_sedang + $item->pk_sedang + $item->jl_sedang}}</td>
                            <td>{{$item->b_selesai + $item->jk_selesai + $item->pk_selesai + $item->jl_selesai}}</td>
                            
                            <td>
                                <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/pbj/delete/{{$item->id}}"
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
                <h3 class="card-title">FORM PBJ</h3>
                <div class="card-tools">
                </div>
            </div>
            <form class="form-horizontal" method="post" action="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/excel/{{$subkegiatan_id}}/{{$bulan}}/pbj">
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
                        <input type="text" class="form-control" name="jenis" placeholder="e-Purchasing">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Barang</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="belum" name="b_belum" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="sedang" name="b_sedang" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="selesai" name="b_selesai" onkeypress="return hanyaAngka(event)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jasa Konsultasi</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="belum" name="jk_belum" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="sedang" name="jk_sedang" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="selesai" name="jk_selesai" onkeypress="return hanyaAngka(event)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Pekerjaan Konstruksi</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="belum" name="pk_belum" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="sedang" name="pk_sedang" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="selesai" name="pk_selesai" onkeypress="return hanyaAngka(event)">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Jasa Lainnya</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="belum" name="jl_belum" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="sedang" name="jl_sedang" onkeypress="return hanyaAngka(event)">
                    </div>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="selesai" name="jl_selesai" onkeypress="return hanyaAngka(event)">
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

<!-- Select2 -->
<script src="/admin/plugins/select2/js/select2.full.min.js"></script>
<script>
    function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
 
    return false;
    return true;
}
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