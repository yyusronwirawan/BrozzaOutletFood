<?php

namespace App\Http\Controllers\outlet;

use App\Http\Controllers\Controller;
use App\Models\pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DatapemesanController extends Controller
{
    public function index()
    {
        $outletId = Auth::user()->id;

        $pemesanan = Pemesanan::whereHas('outlet', function ($query) use ($outletId) {
            $query->where('id_pengguna', $outletId);
        })
            ->paginate(10);

        return view('outlet.Datapemesanan.pemesanan', compact('pemesanan'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $outletId = Auth::user()->id;

        $pemesanan = Pemesanan::where('kode_pesanan', 'like', '%' . $search . '%')
            ->whereHas('outlet', function ($query) use ($outletId) {
                $query->where('id_pengguna', $outletId);
            })
            ->paginate(10);

        return view('outlet.Datapemesanan.pemesanan', compact('pemesanan'));
    }
}
