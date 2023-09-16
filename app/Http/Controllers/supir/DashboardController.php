<?php

namespace App\Http\Controllers\supir;

use App\Http\Controllers\Controller;
use App\Models\pemesanan;
use App\Models\pengiriman;
use App\Models\truk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::all();
        $jumlahpengirimanST = pengiriman::where('status_pengiriman','Sampai di tujuan')->count();
        $jumlahpengirimanBL = Pengiriman::where('status_pengiriman', '!=', 'Sampai di tujuan')->count();
        $jumlahtruk = truk::all()->count();
        return view('supir.dashboard', compact('pemesanan','jumlahtruk','jumlahpengirimanST','jumlahpengirimanBL'));
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $jumlahpengirimanST = pengiriman::where('status_pengiriman','Sampai di tujuan')->count();
        $jumlahpengirimanBL = Pengiriman::where('status_pengiriman', '!=', 'Sampai di tujuan')->count();
        $jumlahtruk = truk::all()->count();
        $pemesanan = Pemesanan::where('kode_pesanan', 'like', '%' . $search . '%')->get();
        return redirect()->route('dashboardsupir',compact('jumlahtruk','jumlahpengirimanST','jumlahpengirimanBL'))->with('searchResult', $pemesanan);
    }
}
