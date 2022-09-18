<?php

namespace App\Http\Controllers;

use App\Models\Uraian;
use App\Models\Program;
use App\Models\Kegiatan;
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
    }
    public function rfk($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
    }
    public function kppbj($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
    }
    public function m($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
    }
    public function pbj($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
    }
    public function v($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
    }
    public function fiskeu($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
    }

    public function input($program_id, $kegiatan_id, $subkegiatan_id, $bulan)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $uraian = Uraian::where('subkegiatan_id', $subkegiatan_id)->get();
        return view('bidang.excel.input', compact('program', 'kegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'bulan', 'uraian'));
    }
}
