<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Skpd;
use App\Models\User;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    public function index()
    {
        $data = Skpd::get();
        return view('superadmin.skpd.index', compact('data'));
    }

    public function createakun($id)
    {
        $role = Role::where('name', 'admin')->first();
        $skpd = Skpd::find($id);

        $n = new User;
        $n->name = $skpd->nama;
        $n->username = $skpd->kode_skpd;
        $n->password = bcrypt('adminskpd');
        $n->save();

        $skpd->update(['user_id' => $n->id]);

        $n->roles()->attach($role);

        toastr()->success('Berhasil Dibuat');
        return back();
    }

    public function resetakun($id)
    {
        Skpd::find($id)->user->update(['password' => bcrypt('adminskpd')]);
        toastr()->success('Berhasil Direset');
        return back();
    }
}
