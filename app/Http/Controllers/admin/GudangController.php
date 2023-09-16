<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\gudang;
// use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade\Pdf;


class GudangController extends Controller
{

    function tampilan()
    {
        $gudangs = gudang::paginate(10);
        return view('admin.gudang.gudang', ['gudangs' => $gudangs]);
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
        return redirect('/admin/gudang')->with('success', 'Data Berhasil Ditambahkan');
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
        return redirect("/admin/gudang")->with('edit', 'Data Berhasil Diubah');
    }
    // hapus data gudang
    function delete(Request $id)
    {
        gudang::find($id->id)->delete();
        return redirect("/admin/gudang")->with('delete', 'Data Berhasil Dihapus');
    }
    // search data gudang
    function search(Request $request)
    {
        $search = $request->search;
        $gudangs = gudang::where('nama_gudang', 'like', '%' . $search . '%')->paginate(10);
        return view('admin.gudang.gudang', ['gudangs' => $gudangs]);
    }
}
