<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Uraian;
use App\Models\Program;
use App\Models\T_input;
use App\Models\Kegiatan;
use App\Models\T_pbj;
use App\Models\T_pptk;
use App\Models\T_st;
use App\Models\T_m;
use Illuminate\Http\Request;

class ExcelController extends Controller
{
    public function index($program_id, $kegiatan_id, $subkegiatan_id)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        return view('bidang.excel.index', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id'));
    }

    public function bulan($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        return view('bidang.excel.data', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'bulan'));
    }
    public function sp($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        toastr()->info('Perlu pengembangan dan wawancara lebih lanjut terkait menu ini');
        return back();
    }
    public function rfk($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        toastr()->info('Perlu pengembangan dan wawancara lebih lanjut terkait menu ini');
        return back();
    }
    public function kppbj($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        toastr()->info('Perlu pengembangan dan wawancara lebih lanjut terkait menu ini');
        return back();
    }
    public function m($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $uraian = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->where('tahun', $program->tahun)->get();
        $data = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->where('tahun', $program->tahun)->get()->map(function ($item) {
            return $item->m;
        })->collapse();

        return view('bidang.excel.m', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'bulan', 'uraian', 'data'));
    }
    public function deleteM($program_id, $kegiatan_id, $subkegiatan_id, $bulan, $m_id)
    {
        T_m::find($m_id)->delete();
        toastr()->success('Berhasil Dihapus');
        return back();
    }
    public function storeM(Request $req, $program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        T_m::create($req->all());
        toastr()->success('Berhasil Di Simpan');
        return back();
    }
    public function pbj($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $uraian = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->where('tahun', $program->tahun)->get();
        $data = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->where('tahun', $program->tahun)->get()->map(function ($item) {
            return $item->pbj;
        })->collapse();

        return view('bidang.excel.pbj', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'bulan', 'uraian', 'data'));
    }

    public function deletePbj($program_id, $kegiatan_id, $subkegiatan_id, $bulan, $pbj_id)
    {
        T_pbj::find($pbj_id)->delete();
        toastr()->success('Berhasil Dihapus');
        return back();
    }

    public function st($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $uraian = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->where('tahun', $program->tahun)->get();
        $data = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->where('tahun', $program->tahun)->get()->map(function ($item) {
            return $item->st;
        })->collapse();

        return view('bidang.excel.st', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'bulan', 'uraian', 'data'));
    }
    public function deleteSt($program_id, $kegiatan_id, $subkegiatan_id, $bulan, $st_id)
    {
        T_st::find($st_id)->delete();
        toastr()->success('Berhasil Dihapus');
        return back();
    }
    public function storeSt(Request $req, $program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        T_st::create($req->all());
        toastr()->success('Berhasil Di Simpan');
        return back();
    }

    public function storePbj(Request $req, $program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        T_pbj::create($req->all());
        toastr()->success('Berhasil Di Simpan');
        return back();
    }
    public function v($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        toastr()->info('Perlu pengembangan dan wawancara lebih lanjut terkait menu ini');
        return back();
    }
    public function fiskeu($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $uraian = Uraian::where('subkegiatan_id', $subkegiatan_id)->get();
        $data = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->get()->map(function ($item) {
            return $item->uraiankegiatan;
        });

        $pptk = T_pptk::where('tahun', $program->tahun)->where('bulan', $bulan)->where('jenis', 'input')->where('subkegiatan_id', $subkegiatan_id)->first();

        return view('bidang.excel.fiskeu', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'bulan', 'uraian', 'data', 'pptk'));
    }

    public function input($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $uraian = Uraian::where('subkegiatan_id', $subkegiatan_id)->get();
        $data = T_input::where('subkegiatan_id', $subkegiatan_id)->where('bulan', $bulan)->get()->map(function ($item) {
            $item->dpa = $item->uraiankegiatan->dpa;
            return $item;
        });

        $pptk = T_pptk::where('tahun', $program->tahun)->where('bulan', $bulan)->where('jenis', 'input')->where('subkegiatan_id', $subkegiatan_id)->first();


        return view('bidang.excel.input', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'bulan', 'uraian', 'data', 'pptk'));
    }

    public function storeInput(Request $req, $program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $check_pptk = T_pptk::where('tahun', $program->tahun)->where('bulan', $bulan)->where('jenis', 'input')->where('subkegiatan_id', $subkegiatan_id)->first();
        if ($check_pptk == null) {
            toastr()->error('Harap Isi, NIP dan Nama PPTK terlebih dahulu');
            return back();
        }
        $data = Uraian::where('id', $req->uraiansubkegiatan)->first();
        $tahun = Carbon::now()->year;
        $check = T_input::where('uraian_id', $req->uraiansubkegiatan)->where('bulan', $bulan)->where('tahun', $tahun)->first();

        if ($check != null) {
            toastr()->error('Data Sudah Ditambahkan');
            return back();
        } else {
            $n = new T_input;
            $n->bulan = $bulan;
            $n->tahun = $data->tahun;
            $n->skpd_id = $data->skpd_id;
            $n->bidang_id = $data->bidang_id;
            $n->program_id = $data->program_id;
            $n->kegiatan_id = $data->kegiatan_id;
            $n->subkegiatan_id = $data->subkegiatan_id;
            $n->uraian_id = $req->uraiansubkegiatan;
            $n->t_pptk_id = $req->pptk_id;
            $n->save();

            toastr()->success('Berhasil Disimpan');
            return back();
        }
    }

    public function updatepptk(Request $req,  $program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $param = $req->all();
        $param['tahun'] = $program->tahun;
        $param['bulan'] = $bulan;
        $param['program_id'] = $program_id;
        $param['kegiatan_id'] = $kegiatan_id;
        $param['subkegiatan_id'] = $subkegiatan_id;
        $param['jenis'] = 'input';

        if ($req->button == 'save') {
            T_pptk::create($param);
            toastr()->success('Berhasil Diupdate');
        } elseif ($req->button == 'update') {
            T_pptk::find($req->pptk_id)->update($param);
            toastr()->success('Berhasil Diupdate');
        } else {
        }
        return back();
    }
    public function deleteInput($program_id, $kegiatan_id, $subkegiatan_id, $bulan, $input_id)
    {
        T_input::find($input_id)->delete();
        toastr()->success('Berhasil Dihapus');
        return back();
    }
}
