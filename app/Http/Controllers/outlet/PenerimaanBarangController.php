<?php

namespace App\Http\Controllers\outlet;

use App\Http\Controllers\Controller;
use App\Models\outlet;
use App\Models\penerima_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerimaanBarangController extends Controller
{

    public function index()
    {
        $cek = outlet::where('id_pengguna', Auth::user()->id)->first();
        $outlet = penerima_barang::where('id_outlet', $cek->id)->get();
        $penerimaBarangs = penerima_barang::with('pengiriman.pemesanan.barangs')->paginate(10);

        return view('outlet.penerimaanbarang.penerimaanbarang', compact('penerimaBarangs', 'outlet'));
    }

    public function update(Request $request)
    {
        $cek = outlet::where('id_pengguna', Auth::user()->id)->first();
        $id = $request->id;

        $penerimaanBarang = penerima_barang::find($id);
        $penerimaanBarang->status = 'Sudah Diterima';
        $penerimaanBarang->save();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $cek = outlet::where('id_pengguna', Auth::user()->id)->first();
        $search = $request->search;

        $outlet = penerima_barang::where('id_outlet', $cek->id)->get();

        $penerimaBarangs = penerima_barang::with('pengiriman.pemesanan.barangs')
            ->whereHas('pengiriman.pemesanan', function ($query) use ($search) {
                $query->where('kode_pesanan', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('outlet.penerimaanbarang.penerimaanbarang', compact('penerimaBarangs', 'outlet'));
    }





    // function index(){

    //     $penerimaBarangs = penerima_barang::with('pengiriman.pemesanan.barangs')->paginate(10);
    //     $outlet = penerima_barang::where('id_outlet', '=', Auth::user()->id)->get();
    //     return view('outlet.penerimaanbarang.penerimaanbarang', ['penerimaanBarang' => $penerimaBarangs], ['outlet' => $outlet]);
    // }
    // function update(Request $request){
    //     $id = $request->id;

    //     $penerimaanBarang = new penerima_barang;
    //     $penerimaanBarang->where('id',$id)->update([
    //         'status' => 'Sudah Diterima',
    //     ]);
    //     return view('outlet.penerimaanbarang.penerimaanbarang');
    // }
    // public function search(Request $request)
    // {
    //     $search = $request->search;

    //     $penerimaBarangs = penerima_barang::with('pengiriman.pemesanan.barangs')
    //         ->whereHas('pengiriman.pemesanan', function ($query) use ($search) {
    //             $query->where('kode_pesanan', 'like', '%' . $search . '%');
    //         })
    //         ->paginate(10);

    //     $outlet = penerima_barang::where('id_outlet', Auth::user()->id)->get();

    //     return view('outlet.penerimaanbarang.penerimaanbarang', ['penerimaanBarang' => $penerimaBarangs], ['outlet' => $outlet]);
    // }
}
