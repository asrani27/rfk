<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Uraian;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Subkegiatan;
use Illuminate\Http\Request;

class RealisasiController extends Controller
{
    public function sisakeu($uraian)
    {
        $bulanrealisasi = Carbon::now()->subMonth()->month;

        if ($bulanrealisasi == 1) {
            $sisakeu = $uraian->p_januari_keuangan;
        } elseif ($bulanrealisasi == 2) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan) - $uraian->r_januari_keuangan;
        } elseif ($bulanrealisasi == 3) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan) - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan);
        } elseif ($bulanrealisasi == 4) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan) - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan);
        } elseif ($bulanrealisasi == 5) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan);
        } elseif ($bulanrealisasi == 6) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan + $uraian->p_juni_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan + $uraian->r_mei_keuangan);
        } elseif ($bulanrealisasi == 7) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan + $uraian->p_juni_keuangan + $uraian->p_juli_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan + $uraian->r_mei_keuangan + $uraian->r_juni_keuangan);
        } elseif ($bulanrealisasi == 8) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan + $uraian->p_juni_keuangan + $uraian->p_juli_keuangan + $uraian->p_agustus_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan + $uraian->r_mei_keuangan + $uraian->r_juni_keuangan + $uraian->r_juli_keuangan);
        } elseif ($bulanrealisasi == 9) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan + $uraian->p_juni_keuangan + $uraian->p_juli_keuangan + $uraian->p_agustus_keuangan + $uraian->p_september_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan + $uraian->r_mei_keuangan + $uraian->r_juni_keuangan + $uraian->r_juli_keuangan + $uraian->r_agustus_keuangan);
        } elseif ($bulanrealisasi == 10) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan + $uraian->p_juni_keuangan + $uraian->p_juli_keuangan + $uraian->p_agustus_keuangan + $uraian->p_september_keuangan + $uraian->p_oktober_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan + $uraian->r_mei_keuangan + $uraian->r_juni_keuangan + $uraian->r_juli_keuangan + $uraian->r_agustus_keuangan + $uraian->r_september_keuangan);
        } elseif ($bulanrealisasi == 11) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan + $uraian->p_juni_keuangan + $uraian->p_juli_keuangan + $uraian->p_agustus_keuangan + $uraian->p_september_keuangan + $uraian->p_oktober_keuangan + $uraian->p_november_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan + $uraian->r_mei_keuangan + $uraian->r_juni_keuangan + $uraian->r_juli_keuangan + $uraian->r_agustus_keuangan + $uraian->r_september_keuangan + $uraian->r_oktober_keuangan);
        } elseif ($bulanrealisasi == 12) {
            $sisakeu = ($uraian->p_januari_keuangan + $uraian->p_februari_keuangan + $uraian->p_maret_keuangan + $uraian->p_april_keuangan + $uraian->p_mei_keuangan + $uraian->p_juni_keuangan + $uraian->p_juli_keuangan + $uraian->p_agustus_keuangan + $uraian->p_september_keuangan + $uraian->p_oktober_keuangan + $uraian->p_november_keuangan + $uraian->p_desember_keuangan)  - ($uraian->r_januari_keuangan + $uraian->r_februari_keuangan + $uraian->r_maret_keuangan + $uraian->r_april_keuangan + $uraian->r_mei_keuangan + $uraian->r_juni_keuangan + $uraian->r_juli_keuangan + $uraian->r_agustus_keuangan + $uraian->r_september_keuangan + $uraian->r_oktober_keuangan + $uraian->r_november_keuangan);
        }

        return $sisakeu;
    }
    public function create($program_id, $kegiatan_id, $subkegiatan_id, $uraian_id)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $subkegiatan = Subkegiatan::find($subkegiatan_id);
        $uraian = Uraian::find($uraian_id);

        $sisakeu = $this->sisakeu($uraian);

        $bulanrealisasi = Carbon::now()->subMonth()->month;
        // $sisafis = $uraian->dpa - $uraian->r_januari_fisik - $uraian->r_februari_fisik - $uraian->r_maret_fisik - $uraian->r_april_fisik - $uraian->r_mei_fisik - $uraian->r_juni_fisik - $uraian->r_juli_fisik - $uraian->r_agustus_fisik - $uraian->r_september_fisik - $uraian->r_oktober_fisik - $uraian->r_november_fisik - $uraian->r_desember_fisik;
        return view('bidang.realisasi.index', compact('program', 'kegiatan', 'subkegiatan', 'program_id', 'kegiatan_id', 'subkegiatan_id', 'uraian', 'uraian_id', 'bulanrealisasi', 'sisakeu'));
    }

    public function store(Request $req, $program_id, $kegiatan_id, $subkegiatan_id, $uraian_id)
    {
        $program = Program::find($program_id);
        $kegiatan = Kegiatan::find($kegiatan_id);
        $subkegiatan = Subkegiatan::find($subkegiatan_id);
        $uraian = Uraian::find($uraian_id);

        $bulanrealisasi = Carbon::now()->subMonth()->month;
        if ($bulanrealisasi == 1) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_januari_keuangan);
        } elseif ($bulanrealisasi == 2) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_februari_keuangan);
        } elseif ($bulanrealisasi == 3) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_maret_keuangan);
        } elseif ($bulanrealisasi == 4) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_april_keuangan);
        } elseif ($bulanrealisasi == 5) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_mei_keuangan);
        } elseif ($bulanrealisasi == 6) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_juni_keuangan);
        } elseif ($bulanrealisasi == 7) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_juli_keuangan);
        } elseif ($bulanrealisasi == 8) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_agustus_keuangan);
        } elseif ($bulanrealisasi == 9) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_september_keuangan);
        } elseif ($bulanrealisasi == 10) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_oktober_keuangan);
        } elseif ($bulanrealisasi == 11) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_november_keuangan);
        } elseif ($bulanrealisasi == 12) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_desember_keuangan);
        }

        if ($bulanrealisasi == 1) {
            $keuangan = (int)str_replace(str_split('.'), '', $req->r_januari_fisik);
        } elseif ($bulanrealisasi == 2) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_februari_fisik);
        } elseif ($bulanrealisasi == 3) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_maret_fisik);
        } elseif ($bulanrealisasi == 4) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_april_fisik);
        } elseif ($bulanrealisasi == 5) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_mei_fisik);
        } elseif ($bulanrealisasi == 6) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_juni_fisik);
        } elseif ($bulanrealisasi == 7) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_juli_fisik);
        } elseif ($bulanrealisasi == 8) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_agustus_fisik);
        } elseif ($bulanrealisasi == 9) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_september_fisik);
        } elseif ($bulanrealisasi == 10) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_oktober_fisik);
        } elseif ($bulanrealisasi == 11) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_november_fisik);
        } elseif ($bulanrealisasi == 12) {
            $fisik = (int)str_replace(str_split('.'), '', $req->r_desember_fisik);
        }

        $sisakeu = $this->sisakeu($uraian);

        if ($keuangan > $sisakeu) {
            toastr()->error('Nominal Tidak Boleh Melebihi Sisa DPA');
            return back();
        }


        //update realisasi
        $u = $uraian;
        if ($bulanrealisasi == 1) {
            $u->r_januari_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 2) {
            $u->r_februari_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 3) {
            $u->r_maret_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 4) {
            $u->r_april_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 5) {
            $u->r_mei_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 6) {
            $u->r_juni_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 7) {
            $u->r_juli_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 8) {
            $u->r_agustus_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 9) {
            $u->r_september_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 10) {
            $u->r_oktober_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 11) {
            $u->r_november_keuangan     = $keuangan;
        } elseif ($bulanrealisasi == 12) {
            $u->r_desember_keuangan     = $keuangan;
        }

        if ($bulanrealisasi == 1) {
            $u->r_januari_fisik     = $fisik;
        } elseif ($bulanrealisasi == 2) {
            $u->r_februari_fisik     = $fisik;
        } elseif ($bulanrealisasi == 3) {
            $u->r_maret_fisik     = $fisik;
        } elseif ($bulanrealisasi == 4) {
            $u->r_april_fisik     = $fisik;
        } elseif ($bulanrealisasi == 5) {
            $u->r_mei_fisik     = $fisik;
        } elseif ($bulanrealisasi == 6) {
            $u->r_juni_fisik     = $fisik;
        } elseif ($bulanrealisasi == 7) {
            $u->r_juli_fisik     = $fisik;
        } elseif ($bulanrealisasi == 8) {
            $u->r_agustus_fisik     = $fisik;
        } elseif ($bulanrealisasi == 9) {
            $u->r_september_fisik     = $fisik;
        } elseif ($bulanrealisasi == 10) {
            $u->r_oktober_fisik     = $fisik;
        } elseif ($bulanrealisasi == 11) {
            $u->r_november_fisik     = $fisik;
        } elseif ($bulanrealisasi == 12) {
            $u->r_desember_fisik     = $fisik;
        }

        $u->save();

        toastr()->success('Berhasil Disimpan');
        return redirect('/skpd/bidang/program/kegiatan/' . $program_id . '/sub/' . $kegiatan_id . '/uraian/' . $subkegiatan_id);
    }
}
