<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\truk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TrukController extends Controller
{
    //menampilkan data truk
    function index()
    {
        $truk = truk::paginate(10);
        return view('admin.Truck.truk', ['truk' => $truk]);
    }
    // menambah data truk
    function create(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'jenis_truk' => 'required|min:5',
            'plat_nomor' => 'required|min:5',
            'kapasitas' => 'required',
        ], $messages);

        truk::create([
            'jenis_truk' => $request->jenis_truk,
            'plat_nomor' => $request->plat_nomor,
            'kapasitas' => $request->kapasitas
        ]);
        return redirect('/admin/truk')->with('success', 'Data Berhasil Ditambahkan');
    }
    // Update data truk
    function update(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'jenis_truk' => 'required|min:5',
            'plat_nomor' => 'required|min:5',
            'kapasitas' => 'required',
        ], $messages);
        truk::find($request->id)->update([
            'jenis_truk' => $request->jenis_truk,
            'plat_nomor' => $request->plat_nomor,
            'kapasitas' => $request->kapasitas
        ]);
        return redirect("/admin/truk")->with('edit', 'Data Berhasil Diubah');
    }
    // hapus data truk
    function delete(Request $id)
    {
        truk::find($id->id)->delete();
        return redirect("/admin/truk")->with('delete', 'Data Berhasil Dihapus');
    }
    // search data truk
    function search(Request $request)
    {
        $search = $request->search;
        $truk = truk::where(function ($query) use ($search) {
            $query->where('jenis_truk', 'like', '%' . $search . '%')
                ->orWhere('plat_nomor', 'like', '%' . $search . '%');
        })->paginate(10);
        return view('admin.Truck.truk', ['truk' => $truk]);
    }
}
