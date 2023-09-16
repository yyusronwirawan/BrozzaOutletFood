<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\gudang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GudangController extends Controller
{

    function tampilan()
    {
        $gudangs = gudang::paginate(10);
        return view('pegawai.gudang.gudang', ['gudangs' => $gudangs]);
    }
    // menambah data gudang
    function create(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'nama_gudang' => 'required|min:5',
            'alamat' => 'required|min:5',
        ], $messages);
        gudang::create([
            'nama_gudang' => $request->nama_gudang,
            'alamat' => $request->alamat
        ]);
        return redirect('/pegawai/gudang')->with('success', 'Data Berhasil Ditambahkan');
    }
    // update data gudang
    function update(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'nama_gudang' => 'required|min:5',
            'alamat' => 'required|min:5',
        ], $messages);

        gudang::find($request->id)->update([
            'nama_gudang' => $request->nama_gudang,
            'alamat' => $request->alamat,
        ]);
        return redirect("/pegawai/gudang")->with('edit', 'Data Berhasil Diubah');
    }
    // hapus data gudang
    function delete(Request $request)
    {
        // dd($request->id);
        $gudang = gudang::find($request->id);
        $gudang->delete();
        return redirect("/pegawai/gudang")->with('delete', 'Data Berhasil Dihapus');
    }
    // search data gudang
    function search(Request $request)
    {
        $search = $request->search;
        $gudangs = gudang::where('nama_gudang', 'like', '%' . $search . '%')->paginate(10);
        return view('pegawai.gudang.gudang', ['gudangs' => $gudangs]);
    }

}
