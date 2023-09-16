<?php

namespace App\Http\Controllers\admin\pengguna;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    // Menampilkan data pengguna yang hanya sebagai user 
    public function index()
    {
        $pengguna = User::where('pegawai_id', '2')->where('status', 'Terkonfirmasi')->paginate(10);
        $pegawaiBT = User::where('pegawai_id', '2')->where('status', 'Belum Terkonfirmasi')->get();

        $hakAkses = pegawai::all();
        $data = [
            'pengguna' => $pengguna,
            'pegawaiBT' => $pegawaiBT,
            'hakAkses' => $hakAkses
        ];
        // Cek apakah ada pengguna dengan hak akses sebagai pegawai yang Belum Terkonfirmasi
        if ($pegawaiBT->isEmpty()) {
            $data['info'] = 'Tidak ada pengguna dengan hak akses sebagai pegawai yang Belum Terkonfirmasi.';
        }
        return view('admin.dataPengguna.pegawai.Datapegawai', $data);
    }
    // menambahkan data pengguna
    function create(Request $request)
    {
        // Ubah status pengguna menjadi "Terkonfirmasi"
        $pengguna = User::find($request->id);
        $pengguna->status = 'Terkonfirmasi';
        $pengguna->save();
        return redirect('/admin/pegawai')->with('success', 'Data Pegawai Berhasil Ditambahkan');
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
        // membuat data pengguna
        $requestData = $request->all();
        $pengguna = User::find($request->id);
        $pengguna->update($requestData);
        return redirect('/admin/pegawai')->with('edit', 'Data User Berhasil Diubah');
    }
    // Menghapus data Terkonfirmasi pegawai
    function delete(Request $request)
    {
         // Ubah status pengguna menjadi "Terkonfirmasi"
         $pengguna = User::find($request->id);
         $pengguna->status = 'Belum Terkonfirmasi';
         $pengguna->update();
         return redirect('/admin/pegawai')->with('delete', 'Data Pegawai Berhasil Dihapus');
    }
    // search data pengguna
    function search(Request $request)
    {
        $search = $request->get('search');
        // Mengambil pengguna dengan status sebagai Belum Terkonfirmasi yang belum ada di tabel pengguna
        $pegawaiBT = User::where('pegawai_id', '2')->where('status', 'Belum Terkonfirmasi')->get();
        $pengguna = User::where('nama_pengguna', 'LIKE', '%' . $search . '%')->where('pegawai_id', 2)->where('status', 'Terkonfirmasi')->paginate(10);
        $hakAkses = pegawai::all();
        $data = [
            'pengguna' => $pengguna,
            'pegawaiBT' => $pegawaiBT,
            'hakAkses' => $hakAkses
        ];
        // Cek apakah ada pengguna dengan hak akses sebagai pegawai yang Belum Terkonfirmasi
        if ($pegawaiBT->isEmpty()) {
            $data['info'] = 'Tidak ada pengguna dengan hak akses sebagai pegawai yang Belum Terkonfirmasi.';
        }
        return view('admin.dataPengguna.pegawai.Datapegawai', $data);
    }
}
