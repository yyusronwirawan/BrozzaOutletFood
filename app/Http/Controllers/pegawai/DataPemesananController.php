<?php

namespace App\Http\Controllers\pegawai;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\pemesanan;
use Illuminate\Http\Request;

class DataPemesananController extends Controller
{
    function index()
    {

        $pemesanan = pemesanan::where('status', '!=', 'batal')->paginate(10);

        $data =[
            'pemesanan' => $pemesanan
        ];
        return view('pegawai.pemesanan.pemesanan',$data);
    }
    // mencari data pemesanan
    function search(Request $request){
        $search = $request->get('search');
        $pemesanan = pemesanan::where('kode_pesanan', 'like', '%'.$search.'%')
                              ->where('status', '!=', 'batal')
                              ->paginate(10);
        return view('pegawai.pemesanan.pemesanan', ['pemesanan' => $pemesanan]);
    }
    // Menghapus data pemesanan
    // function delete(Request $request){
    //     $pemesanan = pemesanan::find($request->id);
    //     $pemesanan->delete();
    //     return redirect()->back()->with('success','Data berhasil dihapus');
    // }
}
