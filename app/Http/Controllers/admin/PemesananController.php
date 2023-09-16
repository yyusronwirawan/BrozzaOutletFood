<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\barang;
use App\Models\outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    function index()
    {

        $pemesanan = pemesanan::where('status', '!=', 'batal')->paginate(10);

        $data =[
            'pemesanan' => $pemesanan
        ];
        return view('admin.pemesanan.pemesanan',$data);
    }
    // mencari data pemesanan
    function search(Request $request){
        $search = $request->get('search');
        $pemesanan = pemesanan::where('kode_pesanan', 'like', '%'.$search.'%')
                              ->where('status', '!=', 'batal')
                              ->paginate(10);
        return view('admin.pemesanan.pemesanan',['pemesanan' => $pemesanan]);
    }
    // Menghapus data pemesanan
    // function delete(Request $request){
    //     $pemesanan = pemesanan::find($request->id);
    //     $pemesanan->delete();
    //     return redirect()->back()->with('success','Data berhasil dihapus');
    // }
}
