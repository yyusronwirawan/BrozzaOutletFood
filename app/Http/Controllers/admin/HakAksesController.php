<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use App\Models\pegawai;
use Illuminate\Http\Request;

class HakAksesController extends Controller
{
    function index()
    {
        $hakakses = pegawai::paginate(10);
        return view('admin.dataPengguna.hakakses.hakAkses', ['hakakses' => $hakakses]);
    }
    function create(Request $request)
    {
        $hakakses = new pegawai(
            [
                'hakakses' => $request->hakakses
            ]
        );
        $hakakses->save();

        return redirect('/admin/hakAkses')->with('success', 'Data Berhasil Ditambahkan');
    }
    // menghapus data hak akses
    function delete(Request $id)
    {
        $hakakses = pegawai::find($id->id);
        $hakakses->delete();
        return redirect('/admin/hakAkses')->with('success', 'Data Berhasil Dihapus');
    }
}
