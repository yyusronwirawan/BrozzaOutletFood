<?php

namespace App\Http\Controllers\auth;
use App\Http\Controllers\Controller;
use App\Models\pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registerController extends Controller
{
    //
    public function index()
    {
        $hakakses = pegawai::all();
        return view('register',['hakakses' => $hakakses]);
    }
    public function actionregister(Request $request)
    {
         // membuat pesan validasi
         $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka'
        ];
        // validasi data
        $this->validate($request,[
            'nama_pengguna' => 'required|min:5',
            'username' => 'required|min:5',
            'tlp' => 'required|min:11|numeric',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'password' => 'required',
            'pegawai_id' => 'required',
        ], $messages);
        $requestData = $request->all();
        $requestData['status'] = 'Belum Terkonfirmasi';
        $requestData['password'] = bcrypt($request['password']);
        User::create($requestData);
        return redirect('/login')->with('success', 'Data Berhasil Registrasi');
    }
}
 