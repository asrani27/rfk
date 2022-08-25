<?php

namespace App\Http\Controllers;

use App\Models\PPTK;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PPTKController extends Controller
{
    public function index()
    {
        $data = PPTK::where('bidang_id', Auth::user()->bidang->id)->get();
        return view('bidang.pptk.index', compact('data'));
    }

    public function create()
    {
        return view('bidang.pptk.create');
    }

    public function store(Request $req)
    {
        $n = new PPTK;
        $n->nip_kabid = $req->nip_kabid;
        $n->nama_kabid = $req->nama_kabid;
        $n->nip_pptk = $req->nip_pptk;
        $n->nama_pptk = $req->nama_pptk;
        $n->bidang_id = Auth::user()->bidang->id;
        $n->save();

        toastr()->success('Berhasil Di Simpan');
        return redirect('/skpd/bidang/pptk');
    }

    public function edit($id)
    {
        $data = PPTK::find($id);
        return view('bidang.pptk.edit', compact('data'));
    }

    public function resetpass($id)
    {
        PPTK::find($id)->user->update([
            'password' => bcrypt('123456'),
        ]);
        toastr()->success('password baru : 123456');
        return back();
    }
    public function delete($id)
    {
        try {
            PPTK::find($id)->user->delete();
            PPTK::find($id)->delete();
            toastr()->success('Berhasil Di Hapus');
            return back();
        } catch (\Exception $e) {
            toastr()->error('Tidak bisa di hapus karena memiliki Data terkait Kegiatan');
            return back();
        }
    }

    public function update(Request $req, $id)
    {
        $n = PPTK::find($id);
        $n->nip_kabid = $req->nip_kabid;
        $n->nama_kabid = $req->nama_kabid;
        $n->nip_pptk = $req->nip_pptk;
        $n->nama_pptk = $req->nama_pptk;
        $n->save();

        toastr()->success('Berhasil Di Update');
        return redirect('/skpd/bidang/pptk');
    }

    public function createuser($id)
    {
        $data = PPTK::find($id);
        return view('bidang.pptk.createuser', compact('data'));
    }

    public function storeuser(Request $req, $id)
    {
        $pptk = PPTK::find($id);

        if (Auth::user()->bidang->id != $pptk->bidang_id) {
            toastr()->error('PPTK Ini Bukan di Bidang anda');
            return back();
        }

        DB::beginTransaction();
        try {
            $role = Role::where('name', 'pptk')->first();
            $check = User::where('username', $req->username)->first();
            if ($check != null) {
                toastr()->error('Username sudah ada, silahkan coba yang lain');
                return back();
            } else {
                $n = new User;
                $n->name = $pptk->nama_pptk;
                $n->username = $req->username;
                $n->password = bcrypt($req->password);
                $n->save();

                $n->roles()->attach($role);

                $pptk->update(['user_id' => $n->id]);
            }
            DB::commit();
            toastr()->success('Berhasil Di Buat');
            return redirect('/skpd/bidang/pptk');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error('Sistem Error');
            return back();
        }
    }
}
