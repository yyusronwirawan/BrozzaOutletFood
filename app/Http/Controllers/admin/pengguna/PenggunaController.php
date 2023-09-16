<?php

namespace App\Http\Controllers\admin\pengguna;

use App\Http\Controllers\Controller;
use App\Models\pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\outlet;
use App\Models\supir;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    // Menampilkan data pengguna yang hanya sebagai user 
    public function index()
    {
        $pengguna = User::paginate(10);
        $hakAkses = pegawai::all();
        $data = [
            'pengguna' => $pengguna,
            'hakAkses' => $hakAkses
        ];
        return view('admin.dataPengguna.user.user', $data);
    }
    // menambahkan data pengguna
    function create(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka'
        ];
        // validasi data
        $this->validate($request, [
            'nama_pengguna' => 'required|min:5',
            'username' => 'required|min:5',
            'tlp' => 'required|min:11|numeric',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'password' => 'required',
            'pegawai_id' => 'required',
        ], $messages);
        // membuat data pengguna
        $requestData = $request->all();
        $requestData['password'] = bcrypt($requestData['password']);
        $requestData['status'] = 'Belum Terkonfirmasi';
        // if ($requestData['pegawai_id'] == 5) {
        //     $requestData['status'] = 'Belum Terkonfirmasi';
        // }

        User::create($requestData);;
        return redirect('/admin/pengguna')->with('success', 'Data User Berhasil Ditambahkan');
    }
    // Update data pengguna
    function update(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka'
        ];
        // validasi data
        $this->validate($request, [
            'nama_pengguna' => 'required|min:5',
            'username' => 'required|min:5',
            'tlp' => 'required|min:11|numeric',
            'alamat' => 'required|min:5',
            'email' => 'required',
        ], $messages);
        // Mendapatkan data pengguna yang akan diubah
        $pengguna = User::find($request->id);

        // Menghapus entri di tabel "supir" jika hak akses berubah menjadi "user", "pegawai", "admin", atau "outlet"
        if (in_array($request->pegawai_id, [2, 3,5]) && ($pengguna->pegawai_id == 4 )) {
            supir::where('id_pengguna', $pengguna->id)->delete();
            $pengguna->status='Belum Terkonfirmasi';
            $pengguna->save();
        }

        // Menghapus entri di tabel "outlet" jika hak akses berubah menjadi "user", "pegawai", "admin", atau "outlet"
        if (in_array($request->pegawai_id, [2, 4,5]) && ($pengguna->pegawai_id == 3)) {
            outlet::where('id_pengguna', $pengguna->id)->delete();
            $pengguna->status='Belum Terkonfirmasi';
            $pengguna->save();
        }
        if (in_array($request->pegawai_id, [3, 4,5]) && ($pengguna->pegawai_id == 2)) {
            $pengguna->status='Belum Terkonfirmasi';
            $pengguna->save();
        }
        
        // membuat data pengguna
        $requestData = $request->all();
        $pengguna = User::find($request->id);
        $pengguna->update($requestData);
        return redirect('/admin/pengguna')->with('edit', 'Data User Berhasil Diubah');
    }
    // Menghapus data pengguna
    function delete(Request $request)
    {
        $pengguna = User::find($request->id);
        $pengguna->delete();
        return redirect('/admin/pengguna')->with('delete', 'Data User Berhasil Dihapus');
    }
    // search data pengguna
    function search(Request $request)
    {
        $search = $request->get('search');
        $pengguna = User::where('nama_pengguna', 'LIKE', '%' . $search . '%')->paginate(10);
        $hakAkses = pegawai::all();
        $data = [
            'pengguna' => $pengguna,
            'hakAkses' => $hakAkses
        ];
        return view('admin.dataPengguna.user.user', $data);
    }
}
