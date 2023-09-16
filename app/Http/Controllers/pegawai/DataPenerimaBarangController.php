<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\penerima_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPenerimaBarangController extends Controller
{
    public function index()
    {
        $penerimaBarangs = penerima_barang::with('pengiriman.pemesanan.barangs')->paginate(10);
        $data=[
            'penerimaBarangs'=>$penerimaBarangs
        ];
        return view('pegawai.penerimaanBarang.penerimaanBarang',$data);
    }
    public function search(Request $request)
    {
        $search = $request->search;
        
        $penerimaBarangs = penerima_barang::with('pengiriman.pemesanan.barangs')
            ->whereHas('pengiriman.pemesanan', function ($query) use ($search) {
                $query->where('kode_pesanan', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        
        $data=[
            'penerimaBarangs'=>$penerimaBarangs,
            'search' => $search
        ];
        return view('pegawai.penerimaanBarang.penerimaanBarang',$data);
    }
}
