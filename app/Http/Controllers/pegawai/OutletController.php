<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\outlet;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    //Menampilkan data outlet
    function index()
    {
        // Mengambil id_pengguna yang sudah ada di tabel outlet
        $existingIds = outlet::pluck('id_pengguna')->all();

        // Mengambil pengguna dengan hak akses sebagai outlet (id 3) yang belum ada di tabel outlet
        $users = User::where('pegawai_id', 3)
            ->whereNotIn('id', $existingIds)
            ->get();

        $outlet = outlet::paginate(10);
        //  dd($penggunaBaru);
        $data = [
            'hakAkses' => $users,
            'outlet' => $outlet
        ];
        // Cek apakah ada pengguna dengan hak akses sebagai outlet yang belum ada di tabel outlet
        if ($users->isEmpty()) {
            $data['info'] = 'Tidak ada pengguna dengan hak akses sebagai outlet yang belum ada di tabel outlet.';
        }

        return view('pegawai.outlet.Dataoutlet', $data);
    }
    // Menambahkan id_pengguna ke tabel outlet
    public function create(Request $request)
    {
        $id_pengguna = $request->input('id_pengguna');

        // Periksa apakah id_pengguna sudah ada di tabel outlet
        $existingoutlet = outlet::where('id_pengguna', $id_pengguna)->first();
        if ($existingoutlet) {
            return redirect('/admin/outlet')->with('error', 'Id pengguna telah ada di tabel outlet.');
        }
        // Ubah status pengguna menjadi "Terkonfirmasi"
        $pengguna = User::find($id_pengguna);
        $pengguna->status = 'Terkonfirmasi';
        $pengguna->save();
        $nama_outlet = $pengguna->nama_pengguna;
        // Buat entri baru di tabel outlet
        outlet::create([
            'id_pengguna' => $id_pengguna,
            'nama_outlet' => $nama_outlet,
        ]);

        return redirect('/admin/outlet')->with('success', 'Id pengguna berhasil ditambahkan ke tabel outlet.');
    }
    // Menghapus id_pengguna dari tabel outlet
    public function delete(Request $request)
    {
        $id_pengguna = $request->input('id_pengguna');

        // Periksa apakah id_pengguna ada di tabel outlet
        $existingoutlet = outlet::where('id_pengguna', $id_pengguna)->first();
        if (!$existingoutlet) {
            return redirect('/admin/outlet')->with('error', 'Id pengguna tidak ada di tabel outlet.');
        }
        // Ubah status pengguna menjadi "Belum Terkonfirmasi"
        $pengguna = User::find($id_pengguna);
        $pengguna->status = 'Belum Terkonfirmasi';
        $pengguna->save();

        // Hapus entri di tabel outlet
        $existingoutlet->delete();

        return redirect('/admin/outlet')->with('delete', 'Id pengguna berhasil dihapus dari tabel outlet.');
    }
    // search data outlet
    function search(Request $request)
    {
        $search = $request->get('search');
        // Melakukan pencarian berdasarkan nama_pengguna dan username
        $outlet = outlet::whereHas('user', function ($query) use ($search) {
            $query->where('nama_pengguna', 'LIKE', '%' . $search . '%')
                ->orWhere('username', 'LIKE', '%' . $search . '%');
        })->paginate(10);
        $existingIds = outlet::pluck('id_pengguna')->all();
        // Mengambil pengguna dengan hak akses sebagai outlet (id 3) yang belum ada di tabel outlet
        $users = User::where('pegawai_id', 3)
            ->whereNotIn('id', $existingIds)
            ->get();
        $data = [
            'hakAkses' => $users,
            'outlet' => $outlet
        ];
        if ($users->isEmpty()) {
            $data['info'] = 'Tidak ada pengguna dengan hak akses sebagai outlet yang belum ada di tabel outlet.';
        }
        return view('pegawai.outlet.Dataoutlet', $data);
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
        return redirect('/pegawai/outlet')->with('edit', 'Data User Berhasil Diubah');
    }
}
