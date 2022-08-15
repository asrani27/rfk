<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        return view('bidang.kegiatan.index');
    }

    public function kegiatanById($id)
    {
        $data = Kegiatan::where('program_id', $id)->orderBy('id', 'DESC')->get();
        $program = Program::find($id);
        return view('bidang.kegiatan.index', compact('data', 'program'));
    }

    public function create($id)
    {
        $program = Program::find($id);
        return view('bidang.kegiatan.create', compact('program'));
    }

    public function edit($program_id, $kegiatan_id)
    {
        $program = Program::find($program_id);
        $data = Kegiatan::find($kegiatan_id);
        return view('bidang.kegiatan.edit', compact('program', 'data'));
    }

    public function store(Request $req, $id)
    {
        $n = new Kegiatan;
        $n->program_id = $id;
        $n->nama = $req->nama;
        $n->save();
        toastr()->success('Berhasil Di Simpan');
        return redirect('/skpd/bidang/program/kegiatan/' . $id);
    }

    public function update(Request $req, $program_id, $kegiatan_id)
    {
        $n = Kegiatan::find($kegiatan_id);
        $n->nama = $req->nama;
        $n->save();
        toastr()->success('Berhasil Di Simpan');
        return redirect('/skpd/bidang/program/kegiatan/' . $program_id);
    }
    public function delete($program_id, $kegiatan_id)
    {
        try {
            Kegiatan::find($kegiatan_id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena memiliki Sub kegiatan');
            return back();
        }
    }
}
