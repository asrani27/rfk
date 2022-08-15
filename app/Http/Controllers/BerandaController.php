<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Uraian;
use App\Models\Subkegiatan;
use App\Models\LogBukaTutup;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        return view('superadmin.beranda');
    }

    public function duplikatData()
    {
        $tahun = Carbon::now()->year;
        $data = Uraian::where('skpd_id', Auth::user()->skpd->id)->where('tahun', $tahun)->get()->toArray();
        foreach ($data as $i) {
            $attr = $i;
            $attr['uraian_id'] = $i['id'];
            $attr['status'] = 2;
            Uraian::create($attr);
        }

        return $data;
    }

    public function admin()
    {
        $murni = Auth::user()->skpd->murni;
        $perubahan = Auth::user()->skpd->perubahan;
        $realisasi = Auth::user()->skpd->realisasi;
        $pergeseran = Auth::user()->skpd->pergeseran;
        $log = LogBukaTutup::orderBy('id', 'DESC')->paginate(15);
        return view('admin.beranda', compact('murni', 'perubahan', 'realisasi', 'pergeseran', 'log'));
    }

    public function setMurni()
    {
        $murni = request()->get('murni');
        if ($murni == 'buka') {
            //check
            if (Auth::user()->skpd->pergeseran != 0) {
                toastr()->error('Pergeseran Harap Di tutup terlebih dahulu');
                return back();
            }
            if (Auth::user()->skpd->perubahan != 0) {
                toastr()->error('perubahan Harap Di tutup terlebih dahulu');
                return back();
            }
            if (Auth::user()->skpd->realisasi != 0) {
                toastr()->error('Realisasi Harap Di tutup terlebih dahulu');
                return back();
            }

            if (LogBukaTutup::where('tahun', Carbon::now()->year)->where('nama', 'murni')->first() != null) {
                toastr()->error('Murni Hanya bisa di buka sekali');
                return back();
            }

            Auth::user()->skpd->update(['murni' => 1]);

            $n = new LogBukaTutup;
            $n->tahun = Carbon::now()->year;
            $n->nama = 'murni';
            $n->jenis = 'buka';
            $n->save();

            toastr()->success('Penginputan Dibuka');
            return back();
        } elseif ($murni == 'tutup') {
            Auth::user()->skpd->update(['murni' => 0]);

            $n = new LogBukaTutup;
            $n->tahun = Carbon::now()->year;
            $n->nama = 'murni';
            $n->jenis = 'tutup';
            $n->save();
            toastr()->success('Penginputan Ditutup');
            return back();
        } else {
            toastr()->error('Kata Tidak Sesuai');
            return back();
        }
    }

    public function setPergeseran()
    {
        $pergeseran = request()->get('pergeseran');
        if ($pergeseran == 'buka') {

            $this->duplikatData();
            //check
            if (Auth::user()->skpd->murni != 0) {
                toastr()->error('Murni Harap Di tutup terlebih dahulu');
                return back();
            }
            if (Auth::user()->skpd->perubahan != 0) {
                toastr()->error('perubahan Harap Di tutup terlebih dahulu');
                return back();
            }

            //check ke berapa
            $cp = LogBukaTutup::where('tahun', Carbon::now()->year)->where('nama', 'pergeseran')->latest()->first();
            if ($cp == null) {
                //pergeseran pertama
                $n = new LogBukaTutup;
                $n->tahun = Carbon::now()->year;
                $n->nama = 'pergeseran';
                $n->ke = 1;
                $n->jenis = 'buka';
                $n->save();
            } else {
                //pergeseran selanjutnya
                $n = new LogBukaTutup;
                $n->tahun = Carbon::now()->year;
                $n->nama = 'pergeseran';
                $n->ke = $cp->ke + 1;
                $n->jenis = 'buka';
                $n->save();
            }

            Auth::user()->skpd->update(['pergeseran' => 1]);
            toastr()->success('Penginputan Pergeseran Dibuka');
            return back();
        } elseif ($pergeseran == 'tutup') {
            $cp = LogBukaTutup::where('tahun', Carbon::now()->year)->where('nama', 'pergeseran')->latest()->first();
            Auth::user()->skpd->update(['pergeseran' => 0]);
            $n = new LogBukaTutup;
            $n->tahun = Carbon::now()->year;
            $n->nama = 'pergeseran';
            $n->ke = $cp->ke;
            $n->jenis = 'tutup';
            $n->save();
            toastr()->success('Penginputan Pergeseran Ditutup');
            return back();
        } else {
            toastr()->error('Kata Tidak Sesuai');
            return back();
        }
    }
    public function setPerubahan()
    {
        if (Auth::user()->skpd->perubahan == 0) {

            $tahun = Carbon::now()->year;
            $duplikatData = Subkegiatan::where('tahun', $tahun)->where('skpd_id', Auth::user()->skpd->id)->get();
            foreach ($duplikatData as $d) {
                $attr = $d->toArray();
                $attr['status'] = 2;
                $check = Subkegiatan::where('subkegiatan_id', $attr['id'])->first();
                if ($check == null) {
                    $attr['subkegiatan_id'] = $attr['id'];
                    Subkegiatan::create($attr);
                }
            }
            Auth::user()->skpd->update(['perubahan' => 1]);
            toastr()->success('Penginputan Dibuka');
        } else {
            Auth::user()->skpd->update(['perubahan' => 0]);
            toastr()->success('Penginputan Ditutup');
        }
        return back();
    }

    public function setRealisasi()
    {
        $real = request()->get('realisasi');

        if ($real == 'buka') {
            Auth::user()->skpd->update(['realisasi' => 1]);
            $n = new LogBukaTutup;
            $n->tahun = Carbon::now()->year;
            $n->nama = 'realisasi';
            $n->jenis = 'buka';
            $n->save();
            toastr()->success('Penginputan Dibuka');
        } elseif ($real == 'tutup') {
            Auth::user()->skpd->update(['realisasi' => 0]);
            $n = new LogBukaTutup;
            $n->tahun = Carbon::now()->year;
            $n->nama = 'realisasi';
            $n->jenis = 'tutup';
            $n->save();
            toastr()->success('Penginputan Ditutup');
        } else {
            toastr()->error('Kata tidak sesuai');
            return back();
        }
        return back();
    }
    public function bidang()
    {
        $data = null;
        return view('bidang.beranda', compact('data'));
    }
}
