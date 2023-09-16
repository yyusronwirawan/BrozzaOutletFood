<?php

namespace App\Http\Controllers\outlet;

use App\Http\Controllers\Controller;
use App\Models\outlet;
use App\Models\pemesanan;
use App\Models\penerima_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public $search = '';
    public function index()
    {
        $cek = outlet::where('id_pengguna', Auth::user()->id)->first();
        $jumlahsudahterima = penerima_barang::where('status', 'Sudah Diterima')->where('id_outlet', $cek->id)->count();
        $jumlahbelumterima = penerima_barang::where('status', 'Belum Diterima')->where('id_outlet', $cek->id)->count();
        $jumlahpesanan = pemesanan::where('id_outlet', $cek->id)->count();

        $pemesanan = pemesanan::where('id_outlet', $cek->id)->get();

        return view('outlet.dashboard', compact('pemesanan', 'jumlahsudahterima', 'jumlahbelumterima', 'jumlahpesanan'));
    }

    public function cariStatus(Request $request)
    {
        $cek = outlet::where('id_pengguna', Auth::user()->id)->first();
        $jumlahsudahterima = penerima_barang::where('status', 'Sudah Diterima')->count();
        $jumlahbelumterima = penerima_barang::where('status', 'Belum Diterima')->count();
        $jumlahpesanan = pemesanan::where('id_outlet', $cek->id)->count();
        $kodePemesan = $request->search;

        $pemesanan = pemesanan::where('kode_pesanan', 'like', '%' . $kodePemesan . '%')
            ->where('id_outlet', $cek->id)
            ->get();

        return redirect()->route('dashboard.outlet')->with('searchResult', $pemesanan);
    }
}
