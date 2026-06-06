<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// panggil model
use App\Models\Users;

class LoginController extends Controller
{
    // index
    public function index()
    {
        $data = [   'title'     => 'SMK Taruna Bangsa - Login Administrator',
                    'content'   => 'login/index'
                ];
        return view('login/wrapper', $data);
    }

    // reset
    public function reset()
    {
        $data = [   'title'     => 'Reset Password',
                    'content'   => 'login/reset'
                ];
        return view('login/wrapper', $data);
    }

    // proses
    public function proses(Request $request)
    {
        // validasi
        $request->validate([
            'username'       => 'required',
            'password'       => 'required',
        ]);
        // ambil data login
        $username   = $request->username;
        $password   = $request->password;
        // check database
        $checkUser  = Users::login($username, $password);
        // validasi
        if($checkUser) {
            $request->session()->regenerate();
            // set session
            $request->session()->put([
                'id_user'           => $checkUser->id_user,
                'nama'              => $checkUser->nama,
                'akses_level'       => $checkUser->akses_level,
                'username'          => $checkUser->username
            ]);
            return redirect()->to('admin/dasbor')->with('sukses','Login Berhasil');
        }else{
            return redirect()->to('login')->with('warning',
                    'Username atau password salah!');
        }
    }

    // prosesGantiPassword
    public function prosesGantiPassword(Request $request)
    {
        return redirect()->to('login')->with('sukses','Email berisi link reset password telah kami kirimkan. Silakan klik link tersebut untuk melakukan perubahan password.');
    }

    // logout
    public function logout()
    {
        // proses membuang session: logout
        Session()->forget('id_user');
        Session()->forget('nama');
        Session()->forget('akses_level');
        Session()->forget('username');
        // redirect kembalikan ke halaman login
        return redirect()->to('login')->with('sukses','Logout Berhasil');
    }
}
