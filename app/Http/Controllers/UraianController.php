<?php

namespace App\Http\Controllers;

use App\Models\Uraian;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Subkegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UraianController extends Controller
{
    public function index($program_id, $kegiatan_id, $subkegiatan_id)
    {
        $data = Uraian::where('subkegiatan_id', $subkegiatan_id)->orderBy('id', 'DESC')->get()->map(function ($item) {
            $item->jumlah = $item->januari + $item->februari + $item->maret + $item->april + $item->mei + $item->juni + $item->juli + $item->agustus + $item->september + $item->oktober + $item->november + $item->desember;
            return $item;
        });
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $subkegiatan = Subkegiatan::find($subkegiatan_id);
        return view('bidang.uraian.index', compact('data', 'program', 'kegiatan', 'subkegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id'));
    }

    public function create($program_id, $kegiatan_id, $subkegiatan_id)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $subkegiatan = Subkegiatan::find($subkegiatan_id);

        return view('bidang.uraian.create', compact('program', 'kegiatan', 'subkegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id'));
    }

    public function edit($program_id, $kegiatan_id, $subkegiatan_id, $uraian_id)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $subkegiatan = Subkegiatan::find($subkegiatan_id);
        $data = Uraian::find($uraian_id);
        return view('bidang.uraian.edit', compact('program', 'kegiatan', 'subkegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'data', 'uraian_id'));
    }

    public function store(Request $req, $program_id, $kegiatan_id, $subkegiatan_id)
    {
        $n = new Uraian;
        $n->skpd_id = Auth::user()->bidang->skpd_id;
        $n->bidang_id = Auth::user()->bidang->id;
        $n->program_id = $program_id;
        $n->tahun = Program::find($program_id)->tahun;
        $n->kegiatan_id = $kegiatan_id;
        $n->subkegiatan_id = $subkegiatan_id;
        $n->kode_rekening = $req->kode_rekening;
        $n->nama = $req->nama;
        $n->dpa = (int)str_replace(str_split('Rp.'), '', $req->dpa);
        $n->save();
        toastr()->success('Berhasil Di Simpan');
        return redirect('/skpd/bidang/program/kegiatan/' . $program_id . '/sub/' . $kegiatan_id . '/uraian/' . $subkegiatan_id);
    }

    public function update(Request $req, $program_id, $kegiatan_id, $subkegiatan_id, $uraian_id)
    {
        $n = Uraian::find($uraian_id);
        $n->kode_rekening = $req->kode_rekening;
        $n->nama = $req->nama;
        $n->dpa = (int)str_replace(str_split('Rp.'), '', $req->dpa);
        $n->save();
        toastr()->success('Berhasil Di Update');
        return redirect('/skpd/bidang/program/kegiatan/' . $program_id . '/sub/' . $kegiatan_id . '/uraian/' . $subkegiatan_id);
    }
    public function delete($program_id, $kegiatan_id, $subkegiatan_id, $uraian_id)
    {
        try {
            Uraian::find($uraian_id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus');
            return back();
        }
    }
}
