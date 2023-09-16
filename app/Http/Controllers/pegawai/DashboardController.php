<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\gudang;
use App\Models\pemesanan;
use App\Models\penerima_barang;
use App\Models\sirkulasi_barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahsudahterima = penerima_barang::where('status', 'Sudah Diterima')->count();
        $jumlahbelumterima = penerima_barang::where('status', 'Belum Diterima')->count();
        $jumlahgudang=gudang::all()->count();
        $jumlahbarangmasuk=sirkulasi_barang::where('status_masuk_keluar', 'barangMasuk')->count();
        $jumlahbarangkeluar=sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar')->count();
        $jumlahpesanan= pemesanan::all()->count();
        $pemesanan = pemesanan::all();
        return view('pegawai.dashboard', compact('pemesanan','jumlahsudahterima','jumlahbarangkeluar','jumlahbelumterima','jumlahpesanan','jumlahgudang','jumlahbarangmasuk'));
    }
    // lacak pengiriaman 
    public function search(Request $request)
    {
        $kodePemesan = $request->search;
        $jumlahsudahterima = penerima_barang::where('status', 'Sudah Diterima')->count();
        $jumlahbelumterima = penerima_barang::where('status', 'Belum Diterima')->count();
        $jumlahbarangkeluar=sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar')->count();
        $jumlahpesanan= pemesanan::all()->count();
        $jumlahgudang=gudang::all()->count();

        // Melakukan pencarian berdasarkan kode pemesan
        $pemesanan = pemesanan::where('kode_pesanan', 'like', '%' . $kodePemesan . '%')->get();

        return redirect()->route('dashboard.pegawai',compact('jumlahsudahterima','jumlahbarangkeluar','jumlahbelumterima','jumlahpesanan','jumlahgudang'))->with('searchResult', $pemesanan);
    }
}
