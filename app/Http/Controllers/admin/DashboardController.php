<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\gudang;
use App\Models\outlet;
use App\Models\pemesanan;
use App\Models\sirkulasi_barang;
use App\Models\supir;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesanan = pemesanan::all();
        // Mengambil id_pengguna yang sudah ada di tabel outlet
        $outlet = outlet::all()->count();
        $pegawai = User::where('pegawai_id', '2')->where('status', 'Terkonfirmasi')->count();
        $gudang = gudang::all()->count();
        $BarangMasuk = sirkulasi_barang::where('status_masuk_keluar', 'barangMasuk')->count();
        $BarangKeluar = sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar')->count();
        $supir = supir::all()->count();

        return view('admin.dashboard',compact('pemesanan', 'pegawai','outlet','gudang','BarangMasuk','BarangKeluar','supir'));
    }
    // lacak pengiriaman 
    public function search(Request $request)
    {
        $kodePemesan = $request->search;

        // Mengambil id_pengguna yang sudah ada di tabel outlet
        $outlet = outlet::all()->count();
        $pegawai = User::where('pegawai_id', '2')->where('status', 'Terkonfirmasi')->count();
        $gudang = gudang::all()->count();
        $BarangMasuk = sirkulasi_barang::where('status_masuk_keluar', 'barangMasuk')->count();
        $BarangKeluar = sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar')->count();
        $supir = supir::all()->count();


        // Melakukan pencarian berdasarkan kode pemesan
        $pemesanan = pemesanan::where('kode_pesanan', 'like', '%' . $kodePemesan . '%')->get();

        return redirect()->route('dashboard',compact('pegawai','outlet','gudang','BarangMasuk','BarangKeluar','supir'))->with('searchResult', $pemesanan);
    }
}
