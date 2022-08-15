<?php

namespace App\Http\Controllers;

use App\Models\Uraian;
use App\Models\Program;
use App\Models\Subkegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PencarianController extends Controller
{
    public function bTahun()
    {
        $tahun = request()->get('tahun');
        $status = request()->get('status');

        $data = Uraian::where('tahun', $tahun)->where('bidang_id', Auth::user()->bidang->id)->where('status', $status)->get();
        request()->flash();
        return view('bidang.beranda', compact('data', 'tahun', 'status'));
    }
}
