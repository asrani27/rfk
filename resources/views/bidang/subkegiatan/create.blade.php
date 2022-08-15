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
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">TAMBAH SUB KEGIATAN</h3>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <form method="post" action="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}/add">
                @csrf
                <div class="card-body" style="display: block;">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">TAHUN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$program->tahun}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">PROGRAM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$program->nama}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">KEGIATAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{$kegiatan->nama}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">SUB KEGIATAN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label class="col-sm-2 col-form-label">DPA</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dpa" id="rupiah" required>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-block bg-gradient-primary">SIMPAN</button>
                            <a href="/skpd/bidang/program/kegiatan/{{$program_id}}/sub/{{$kegiatan_id}}"
                                class="btn btn-block btn-outline-primary">KEMBALI</a>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection

@push('js')
{{-- <script>
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
    rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
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
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script> --}}
@endpush