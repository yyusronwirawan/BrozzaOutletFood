<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\pemesanan;
use App\Models\sirkulasi_barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\ResponseTrait;

class SirkulasiBarangController extends Controller
{
    use ResponseTrait;
    //menampilkan data sirkulasi barang Masuk
    public function indexBrgMasuk()
    {
        // mengambil data sirkulasi barangMasuk
        $BarangMasuk = sirkulasi_barang::where('status_masuk_keluar', 'barangMasuk')->paginate(10);
        // menampilkan data barang
        $Barang = barang::all();
        // array data
        $data = [
            'BarangMasuk' => $BarangMasuk,
            'barangs' => $Barang
        ];
        return view(
            'pegawai.sirkulasiBarang.barangMasuk',
            $data
        );
    }
    // menambahkan data sirkulasi barang Masuk
    function createBrgMasuk(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka',
            'exists' => ':attribute tidak ditemukan'
        ];
        // validasi data
        $this->validate($request, [
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'id_barang' => 'required|exists:barangs,id',
            'id_pengguna' => 'required'
        ], $messages);

        $sirkulasiBarang = new sirkulasi_barang([
            'jumlah' => $request->jumlah,
            'tanggal' => $request->tanggal,
            'id_barang' => $request->id_barang,
            'id_pengguna' => $request->id_pengguna,
            'status_masuk_keluar' => 'barangMasuk'
        ]);

        $sirkulasiBarang->save();

        // Update stok_masuk di Databarang
        $barang = barang::find($request->id_barang);
        $barang->stok_masuk += $request->jumlah;
        $barang->stok_akhir += $request->jumlah;
        $barang->save();
        return redirect('/pegawai/barangMasuk')->with('success', 'Data Barang Masuk Berhasil Ditambahkan');
    }
    // mencari data sirkulasi barang Masuk berdasarkan nama barang
    function searchBrgMasuk(Request $request)
    {
        $search = $request->get('search');
        // mencari data sirkulasi barangMasuk dengan kondisi status_masuk_keluar = 'barangMasuk'
        $BarangMasuk = sirkulasi_barang::where('status_masuk_keluar', 'barangMasuk')
            // melakukan filter berdasarkan relasi dengan model barang
            ->whereHas('barangs', function ($query) use ($search) {
                // mencari data barang yang memiliki nama_barang mengandung nilai dari variabel $search
                $query->where('nama_barang', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        $Barang = barang::all();
        $data = [
            'BarangMasuk' => $BarangMasuk,
            'barangs' => $Barang
        ];
        return view(
            'pegawai.sirkulasiBarang.barangMasuk',
            $data
        );
    }
    function updateBrgMasuk(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi',
            'numeric' => ':attribute harus berupa angka',
            'exists' => ':attribute tidak ditemukan'
        ];
        // validasi data
        $this->validate($request, [
            'jumlah' => 'required|numeric',
            'tanggal' => 'required|date',
            'id_barang' => 'required|exists:barangs,id',
            'id_pengguna' => 'required'
        ], $messages);

        // Update stok_masuk dan stok_akhir di tabel barang
        $barang = barang::find($request->id_barang);
        $sirkulasiBarang = sirkulasi_barang::find($request->id);
        $barang->stok_masuk -= $sirkulasiBarang->jumlah; // kurangi stok_masuk dengan jumlah sebelumnya
        $barang->stok_akhir -= $sirkulasiBarang->jumlah; // kurangi stok_akhir dengan jumlah sebelumnya
        $barang->stok_masuk += $request->jumlah; // tambahkan stok_masuk dengan jumlah baru
        $barang->stok_akhir += $request->jumlah; // tambahkan stok_akhir dengan jumlah baru
        $barang->save();


        // Cari data sirkulasi barang yang akan diupdate
        $sirkulasiBarang->jumlah = $request->jumlah;
        $sirkulasiBarang->tanggal = $request->tanggal;
        $sirkulasiBarang->id_barang = $request->id_barang;
        $sirkulasiBarang->id_pengguna = $request->id_pengguna;
        $sirkulasiBarang->status_masuk_keluar = 'barangMasuk';
        $sirkulasiBarang->save();

        return redirect('/pegawai/barangMasuk')->with('edit', 'Data Barang Masuk Berhasil Diupdate');
    }
    // Delete data barang masuk 
    function deleteBrgMasuk(Request $request)
    {
        // Update stok_masuk dan stok_akhir di tabel barang
        $barang = barang::find($request->id_barang);
        $sirkulasiBarang = sirkulasi_barang::find($request->id);
        // dd($barang->stok_masuk -= $sirkulasiBarang->jumlah);
        $barang->stok_masuk -= $sirkulasiBarang->jumlah; // kurangi stok_masuk dengan jumlah sebelumnya
        $barang->stok_akhir -= $sirkulasiBarang->jumlah; // kurangi stok_akhir dengan jumlah sebelumnya
        $barang->save();


        //  data sirkulasi barang hapus
        $sirkulasiBarang->delete();
        // $sirkulasiBarang->delete();
        return redirect('/pegawai/barangMasuk')->with('delete', 'Data Barang Masuk Berhasil Dihapus');
    }





    //menampilkan data sirkulasi barang Keluar
    public function indexBrgKeluar()
    {
        // menampilkan data pemesanan
        // $Pemesanan = pemesanan::all();
        // // mengambil data sirkulasi barangMasuk
        // $BarangKeluar = sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar')->paginate(10);
        // // menampilkan data barang
        // $Barang = barang::all();
        // // array data
        // $data = [
        //     'BarangKeluar' => $BarangKeluar,
        //     'barangs' => $Barang,
        //     'pemesanans' => $Pemesanan
        // ];
        return view(
            'pegawai.sirkulasiBarang.barangKeluar',
            // $data
        );
    }
    // menambahkan data sirkulasi barang Masuk
    // function createBrgKeluar(Request $request)
    // {
    //     // membuat validasi data
    //     $messages = [
    //         'required' => ':attribute wajib diisi',
    //         'numeric' => ':attribute harus berupa angka',
    //         'exists' => ':attribute tidak ditemukan'
    //     ];
    //     // validasi data
    //     $this->validate($request, [
    //         'jumlah' => 'required|numeric',
    //         'tanggal' => 'required|date',
    //         'id_barang' => 'required|exists:barangs,id',
    //         'id_pengguna' => 'required'
    //     ], $messages);

    //     $sirkulasiBarang = new sirkulasi_barang([
    //         'jumlah' => $request->jumlah,
    //         'tanggal' => $request->tanggal,
    //         'id_barang' => $request->id_barang,
    //         'id_pengguna' => $request->id_pengguna,
    //         'status_masuk_keluar' => 'barangKeluar'
    //     ]);

    //     $sirkulasiBarang->save();

    //     // Update stok_masuk di Databarang
    //     $barang = barang::find($request->id_barang);
    //     $barang->stok_keluar += $request->jumlah;
    //     $barang->stok_akhir -= $request->jumlah;
    //     $barang->save();
    //     return redirect('/pegawai/barangKeluar')->with('success', 'Data Barang Keluar Berhasil Ditambahkan');
    // }
    // mencari data sirkulasi barang Keluar berdasarkan nama barang
    // function searchBrgKeluar(Request $request)
    // {
    //     // menampilkan data pemesanan
    //     $Pemesanan = pemesanan::all();

    //     // mengambil data dari inputan search
    //     $search = $request->get('search');
    //     // mencari data sirkulasi barangMasuk dengan kondisi status_masuk_keluar = 'barangMasuk'
    //     $BarangKeluar = sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar')
    //         // melakukan filter berdasarkan relasi dengan model barang
    //         ->whereHas('barangs', function ($query) use ($search) {
    //             // mencari data barang yang memiliki nama_barang mengandung nilai dari variabel $search
    //             $query->where('nama_barang', 'like', '%' . $search . '%');
    //         })
    //         ->paginate(10);
    //     $Barang = barang::all();
    //     $data = [
    //         'BarangKeluar' => $BarangKeluar,
    //         'barangs' => $Barang,
    //         'pemesanans' => $Pemesanan
    //     ];
    //     return view(
    //         'pegawai.sirkulasiBarang.barangKeluar',
    //         $data
    //     );
    // }
    // function updateBrgKeluar(Request $request)
    // {
    //     // membuat validasi data
    //     $messages = [
    //         'required' => ':attribute wajib diisi',
    //         'numeric' => ':attribute harus berupa angka',
    //         'exists' => ':attribute tidak ditemukan'
    //     ];
    //     // validasi data
    //     $this->validate($request, [
    //         'jumlah' => 'required|numeric',
    //         'tanggal' => 'required|date',
    //         'id_barang' => 'required|exists:barangs,id',
    //         'id_pengguna' => 'required'
    //     ], $messages);

    //     // Update stok_masuk dan stok_akhir di tabel barang
    //     $barang = barang::find($request->id_barang);
    //     $sirkulasiBarang = sirkulasi_barang::find($request->id);
    //     $barang->stok_keluar -= $sirkulasiBarang->jumlah; // kurangi stok_masuk dengan jumlah sebelumnya
    //     $barang->stok_akhir += $sirkulasiBarang->jumlah; // tambahkan stok_akhir dengan jumlah sebelumnya
    //     $barang->stok_keluar += $request->jumlah; // tambahkan stok_masuk dengan jumlah baru
    //     $barang->stok_akhir -= $request->jumlah; // kurangi stok_akhir dengan jumlah baru
    //     $barang->save();


    //     // Cari data sirkulasi barang yang akan diupdate
    //     $sirkulasiBarang->jumlah = $request->jumlah;
    //     $sirkulasiBarang->tanggal = $request->tanggal;
    //     $sirkulasiBarang->id_barang = $request->id_barang;
    //     $sirkulasiBarang->id_pengguna = $request->id_pengguna;
    //     $sirkulasiBarang->status_masuk_keluar = 'barangKeluar';
    //     $sirkulasiBarang->save();

    //     return redirect('/pegawai/barangKeluar')->with('edit', 'Data Barang Masuk Berhasil Diupdate');
    // }
    // Delete data barang keluar 
    // function deleteBrgKeluar(Request $request)
    // {
    //     // Update stok_masuk dan stok_akhir di tabel barang
    //     $barang = barang::find($request->id_barang);
    //     $sirkulasiBarang = sirkulasi_barang::find($request->id);
    //     $barang->stok_keluar -= $sirkulasiBarang->jumlah; // kurangi stok_masuk dengan jumlah sebelumnya
    //     $barang->stok_akhir += $sirkulasiBarang->jumlah; // kurangi stok_akhir dengan jumlah sebelumnya
    //     $barang->save();


    //     //  data sirkulasi barang hapus
    //     $sirkulasiBarang->delete();
    //     // $sirkulasiBarang->delete();
    //     return redirect('/pegawai/barangKeluar')->with('delete', 'Data Barang Masuk Berhasil Dihapus');
    // }
}
