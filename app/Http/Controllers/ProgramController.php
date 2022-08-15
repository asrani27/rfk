<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    public function index()
    {
        $data = Program::where('bidang_id', Auth::user()->bidang->id)->get();
        return view('bidang.program.index', compact('data'));
    }

    public function create()
    {
        return view('bidang.program.create');
    }

    public function store(Request $req)
    {
        $n = new Program;
        $n->tahun = $req->tahun;
        $n->nama = $req->nama;
        $n->bidang_id = Auth::user()->bidang->id;
        $n->save();

        toastr()->success('Berhasil Di Simpan');
        return redirect('/skpd/bidang/program');
    }

    public function edit($id)
    {
        $data = Program::find($id);
        return view('bidang.program.edit', compact('data'));
    }

    
    public function delete($id)
    {
        try {
            Program::find($id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena memiliki kegiatan');
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        $n = Program::find($id);
        $n->tahun = $req->tahun;
        $n->nama = $req->nama;
        $n->save();

        toastr()->success('Berhasil Di Update');
        return redirect('/skpd/bidang/program');
    }
    
}
