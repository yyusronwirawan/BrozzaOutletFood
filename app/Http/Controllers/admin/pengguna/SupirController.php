<?php

namespace App\Http\Controllers\admin\pengguna;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\outlet;
use App\Models\pegawai;
use App\Models\User;
use App\Models\supir;
use Illuminate\Http\Request;

class SupirController extends Controller
{
    //Menampilkan data supir
    function index()
    {
        // Mengambil id_pengguna yang sudah ada di tabel supir
        $existingIds = Supir::pluck('id_pengguna')->all();

        // Mengambil pengguna dengan hak akses sebagai supir (id 4) yang belum ada di tabel supir
        $users = User::where('pegawai_id', 4)
            ->whereNotIn('id', $existingIds)
            ->get();

        $supir = supir::paginate(10);

        $data = [
            'hakAkses' => $users,
            'supir' => $supir
        ];

        // Cek apakah ada pengguna dengan hak akses sebagai supir yang belum ada di tabel supir
        if ($users->isEmpty()) {
            $data['info'] = 'Tidak ada pengguna dengan hak akses sebagai supir yang belum ada di tabel supir.';
        } else {
            $data['info'] = null; // Atur nilai info menjadi null jika ada pengguna yang belum ada di tabel supir
        }

        return view('admin.dataPengguna.supir.Datasupir', $data);
    }
    // Menambahkan id_pengguna ke tabel supir
    public function tambahIdPengguna(Request $request)
    {
        // return redirect()->back()->with('success', 'Id pengguna berhasil ditambahkan ke tabel supir.');
        $id_pengguna = $request->input('id_pengguna');

        // Periksa apakah id_pengguna sudah ada di tabel supir
        $existingSupir = Supir::where('id_pengguna', $id_pengguna)->first();
        if ($existingSupir) {
            return redirect('/admin/supir')->with('error', 'Id pengguna telah ada di tabel supir.');
        }
        // Ubah status pengguna menjadi "Terkonfirmasi"
        $pengguna = User::find($id_pengguna);
        $pengguna->status = 'Terkonfirmasi';
        $pengguna->save();

        // Buat entri baru di tabel supir
        Supir::create([
            'id_pengguna' => $id_pengguna,
            'status' => 'supir'
        ]);

        return redirect('/admin/supir')->with('success', 'Id pengguna berhasil ditambahkan ke tabel supir.');
    }
    // Menghapus id_pengguna dari tabel supir
    public function hapusIdPengguna(Request $request)
    {
        $id_pengguna = $request->input('id_pengguna');

        // Periksa apakah id_pengguna ada di tabel supir
        $existingSupir = Supir::where('id_pengguna', $id_pengguna)->first();
        if (!$existingSupir) {
            return redirect('/admin/supir')->with('error', 'Id pengguna tidak ada di tabel supir.');
        }
        // Ubah status pengguna menjadi "Belum Terkonfirmasi"
        $pengguna = User::find($id_pengguna);
        $pengguna->status = 'Belum Terkonfirmasi';
        $pengguna->save();

        // Hapus entri di tabel supir
        $existingSupir->delete();

        return redirect('/admin/supir')->with('delete', 'Id pengguna berhasil dihapus dari tabel supir.');
    }
    // search data supir
    function search(Request $request)
    {
        $search = $request->get('search');
        // Melakukan pencarian berdasarkan nama_pengguna dan username
        $supir = supir::whereHas('user', function ($query) use ($search) {
            $query->where('nama_pengguna', 'LIKE', '%' . $search . '%')
                ->orWhere('username', 'LIKE', '%' . $search . '%');
        })->paginate(10);
        $existingIds = supir::pluck('id_pengguna')->all();
        $users = User::where('pegawai_id', 4)
            ->whereNotIn('id', $existingIds)
            ->get();
        $data = [
            'hakAkses' => $users,
            'supir' => $supir
        ];
        // Cek apakah ada pengguna dengan hak akses sebagai supir yang belum ada di tabel supir
        if ($users->isEmpty()) {
            $data['info'] = 'Tidak ada pengguna dengan hak akses sebagai supir yang belum ada di tabel supir.';
        } 

        return view('admin.dataPengguna.supir.Datasupir', $data);
    }
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
        $pengguna = User::find($request->id_pengguna);
        
        // membuat data pengguna
        $requestData = $request->all();
        // if ($requestData['pegawai_id'] == 5) {
        //     $requestData['status'] = 'Belum Terkonfirmasi';
        // }
        $pengguna->update($requestData);
        return redirect('/admin/supir')->with('edit', 'Data User Berhasil Diubah');
    }
}
