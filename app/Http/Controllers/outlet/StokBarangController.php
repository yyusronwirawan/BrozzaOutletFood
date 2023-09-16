<?php

namespace App\Http\Controllers\outlet;

use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\gudang;
use App\Models\kategori;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    function index(){
        $barangs = barang::paginate(10);
        $kategoris = kategori::all();
        $gudangs = gudang::all();
        // array data
        $data = [
            'barangs' => $barangs,
            'kategoris' => $kategoris,
            'gudangs' => $gudangs
        ];
        return view('outlet.Barang.stokbarang', $data);
    }
        // Mencaari data Barang
        function search(Request $request)
        {
            $search = $request->search;
            $barangs = barang::where('nama_barang', 'like', '%' . $search . '%')->paginate(10);
            $kategoris = kategori::all();
            $gudangs = gudang::all();
            $data = [
                'barangs' => $barangs,
                'kategoris' => $kategoris,
                'gudangs' => $gudangs
            ];
            return view('outlet.Barang.stokbarang', $data);
        }
}
