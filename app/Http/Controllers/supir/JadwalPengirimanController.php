<?php

namespace App\Http\Controllers\supir;

use App\Http\Controllers\Controller;
use App\Models\jadwal_pengiriman;
use Illuminate\Http\Request;

class JadwalPengirimanController extends Controller
{
    // menampilkan data jadwal pengiriman
    public function index()
    {
        $jadwalpengiriman = jadwal_pengiriman::paginate(10);
        return view('supir.jadwalpengiriman.jadwalpengiriman', ['jadwalpengiriman' => $jadwalpengiriman]);
    }
    // mencari jadwal pengiriman
    function search(Request $request)
    {
        $jadwalpengiriman = jadwal_pengiriman::where('Tujuan', 'like', "%" . $request->search . "%")->paginate(10);
        return view('supir.jadwalpengiriman.jadwalpengiriman', ['jadwalpengiriman' => $jadwalpengiriman]);
    }
}
