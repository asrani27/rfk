<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GantiPassController extends Controller
{
    public function index()
    {
        return view('gantipass');
    }

    public function update(Request $req)
    {
        // if (!Hash::check($req->old_password, Auth::user()->password)) {
        //     toastr()->error('Password Lama Tidak Sama');
        //     return back();
        // }
        if ($req->password != $req->confirm_password) {
            toastr()->error('Password Baru Tidak Sesuai');
            return back();
        } else {

            $validator = Validator::make($req->all(), [
                'password' => 'required|min:8|regex:/[0-9]/|regex:/[a-z]/',
            ]);

            if ($validator->fails()) {
                toastr()->error('Password min 8 karakter serta kombinasi angka dan huruf');
                return back();
            }

            Auth::user()->update([
                'password' => bcrypt($req->password)
            ]);

            Auth::logout();
            toastr()->success('Berhasil Di Update, Login Dengan Password Baru');
            return redirect('/');
        }
    }
}
