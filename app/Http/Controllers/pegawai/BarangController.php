<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\barang;
use App\Models\gudang;
use App\Models\kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //Menampilkan data Barang 
    function index()
    {
        $barangs = barang::paginate(10);
        $kategoris = kategori::all();
        $gudangs = gudang::all();
        // array data
        $data = [
            'barangs' => $barangs,
            'kategoris' => $kategoris,
            'gudangs' => $gudangs
        ];
        // dd($data);
        return view(
            'pegawai.barang.Databarang',
            $data
        );
    }
    // Menambahkan data Barang
    function create(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'numeric' => ':attribute harus berupa angka'
        ];
        // validasi data
        $this->validate($request, [
            'nama_barang' => 'required|min:3',
            'harga' => 'required|numeric',
            'satuan' => 'required',
            'kategori_id' => 'required',
            'gudang_id' => 'required',
            'stok_awal' => 'required|numeric',
            'stok_masuk' => 'required|numeric',
            'stok_keluar' => 'required|numeric',
        ], $messages);
        $barangs = new barang(
            [
                'nama_barang' => request('nama_barang'),
                'harga' => request('harga'),
                'satuan' => request('satuan'),
                'kategori_id' => request('kategori_id'),
                'gudang_id' => request('gudang_id'),
                'stok_awal' => request('stok_awal'),
                'stok_akhir' => request('stok_awal'),
                'stok_masuk' => request('stok_masuk'),
                'stok_keluar' => request('stok_keluar')
            ]
        );
        $barangs->save();
        return redirect('/pegawai/Databarang')->with('success', 'Data Berhasil Ditambahkan');
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
        return view('pegawai.barang.Databarang', $data);
    }
    // Menghapus data Barang
    function delete(Request $id)
    {
        $barangs = barang::find($id->id);
        // Hapus semua data sirkulasi barang terkait
        $barangs->sirkulasi_barangs()->delete();
        $barangs->delete();
        return redirect('/pegawai/Databarang')->with('delete', 'Data Berhasil Dihapus');
    }
    function update(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'numeric' => ':attribute harus berupa angka'
        ];
        // validasi data
        $this->validate($request, [
            'nama_barang' => 'required|min:5',
            'harga' => 'required|numeric',
            'satuan' => 'required',
            'kategori_id' => 'required',
            'gudang_id' => 'required',
        ], $messages);

        barang::find($request->id)->update([
            'nama_barang' => $request->nama_barang,
            'harga' => $request->harga,
            'satuan' => $request->satuan,
            'kategori_id' => $request->kategori_id,
            'gudang_id' => $request->gudang_id
        ]);
        return redirect("/pegawai/Databarang")->with('edit', 'Data Berhasil Diubah');
    }
}
