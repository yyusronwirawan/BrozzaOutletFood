<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // menampilkan data kategori
    function index()
    {
        $kategoris = kategori::paginate(10);
        return view('pegawai.barang.kategori', ['kategoris' => $kategoris]);
    }
    // menambah kategori
    function create(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'nama_kategori' => 'required',
        ], $messages);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/pegawai/kategori')->with('success', 'Data Berhasil Ditambahkan');
    }

    // update data kategori
    function update(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'nama_kategori' => 'required|min:5',
        ], $messages);
        kategori::find($request->id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect("/pegawai/kategori")->with('edit', 'Data Berhasil Diubah');
    }
    // hapus data kategori
    function delete(Request $id)
    {
        Kategori::find($id->id)->delete();
        return redirect("/pegawai/kategori")->with('delete', 'Data Berhasil Dihapus');
    }
    // search data kategori
    function search(Request $request)
    {
        $search = $request->search;
        $kategoris = Kategori::where('nama_kategori', 'like', '%' . $search . '%')->paginate(10);
        return view('pegawai.barang.kategori', ['kategoris' => $kategoris]);
    }
}
