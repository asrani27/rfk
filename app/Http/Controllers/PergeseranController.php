<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PergeseranController extends Controller
{
    public function create($program_id, $kegiatan_id, $subkegiatan_id, $uraian_id)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $subkegiatan = Subkegiatan::find($subkegiatan_id);
        $uraian = Uraian::find($uraian_id);
        return view('bidang.pergeseran.create', compact('program', 'kegiatan', 'subkegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'uraian', 'uraian_id'));
    }
}
