<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // proses login
    public function proses(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            // dalam bahasa indonesia
            [
                'email.required' => 'email tidak boleh kosong',
                'password.required' => 'password tidak boleh kosong'
            ]

        );

        $credentials = $request->only('email', 'password');
        // mengecek login
        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            // jika berhasil login
            $users = Auth::user();
            // ceck level
             // cek status pengguna
             if ($users->status == 'Terkonfirmasi') {
                // cek level pengguna
                if ($users->pegawai_id == '1') {
                    // jika level admin
                    return redirect()->intended('/admin/dashboard');
                } elseif ($users->pegawai_id == '2') {
                    // jika level outlet
                    return redirect()->intended('/pegawai/dashboard');
                } elseif ($users->pegawai_id == '3') {
                    // jika level outlet
                    return redirect()->intended('/outlet/dashboard');
                } elseif ($users->pegawai_id == '4') {
                    // jika level supir
                    return redirect()->intended('/supir/dashboard');
                }
            } else {
                // jika status pengguna belum terkonfirmasi
                return redirect('/konfirmasi');
            }
        }

        return back()->withErrors([
            'email' => 'maaf username atau password salah',
        ])->onlyInput('email');
    }
    function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
