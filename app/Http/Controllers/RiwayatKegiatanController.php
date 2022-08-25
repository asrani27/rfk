<?php

namespace App\Http\Controllers;

use App\Models\Uraian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatKegiatanController extends Controller
{
        public function index()
        {
            $select = Uraian::where('bidang_id', Auth::user()->bidang->id)->where('status',null)->get();
            $data = null;
            return view('bidang.riwayat.index',compact('data','select'));
        }

        public function tampilkan()
        {
            $search = request()->get('uraian_id');

            $murni = Uraian::where('id', $search)->get();
            $perubahan = Uraian::where('uraian_id', $search)->get();
            $data = $murni->merge($perubahan);
            $select = Uraian::where('bidang_id', Auth::user()->bidang->id)->where('status',null)->get();
            
            request()->flash();
            return view('bidang.riwayat.index',compact('data','select','select'));
        }
}
