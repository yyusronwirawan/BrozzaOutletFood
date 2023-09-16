<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    // menampilkan data kategori
    function index()
    {
        $kategoris = kategori::paginate(5);
        return view('admin.barang.kategori', ['kategoris' => $kategoris]);
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
        return redirect('/admin/kategori')->with('success', 'Data Berhasil Ditambahkan');
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
        Kategori::find($request->id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect("/admin/kategori")->with('edit', 'Data Berhasil Diubah');
    }
    // hapus data kategori
    function delete(Request $id)
    {
        Kategori::find($id->id)->delete();
        return redirect("/admin/kategori")->with('delete', 'Data Berhasil Dihapus');
    }
    // search data kategori
    function search(Request $request)
    {
        $search = $request->search;
        $kategoris = DB::table('kategoris')->where('nama_kategori', 'like', '%' . $search . '%')->paginate(5);
        return view('admin.barang.kategori', ['kategoris' => $kategoris]);
    }
    // cetak data kategori
    function cetak()
    {
        $kategoris = kategori::all();
        $pdf = PDF::loadview('admin.barang.kategori_pdf', ['kategoris' => $kategoris]);
        return $pdf->download('laporan-kategori-pdf');
    }
}
