<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showlogin()
    {
        if (Auth::check()) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/beranda');
            } elseif (Auth::user()->hasRole('admin')) {
                return redirect('/berandaskpd');
            } else {
                return redirect('/berandabidang');
            }
        } else {
            return view('login');
        }
    }

    public function login(Request $req)
    {
        if (Auth::attempt(['username' => $req->username, 'password' => $req->password], true)) {
            if (Auth::user()->hasRole('superadmin')) {
                return redirect('/beranda');
            } elseif (Auth::user()->hasRole('admin')) {
                return redirect('/admin/beranda');
            } elseif (Auth::user()->hasRole('bidang')) {
                return redirect('/berandabidang');
            } else {
                return 'role lain';
            }
        } else {
            toastr()->error('Username / Password Tidak Ditemukan');
            $req->flash();
            return back();
        }
    }
}
