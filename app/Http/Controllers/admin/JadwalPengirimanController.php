<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use App\Models\jadwal_pengiriman;
use Illuminate\Http\Request;

class JadwalPengirimanController extends Controller
{
    // menampilkan data jadwal pengiriman
    public function index()
    {
        $jadwalpengiriman = jadwal_pengiriman::paginate(10);
        return view('admin.jadwalpengiriman.jadwalpengiriman', ['jadwalpengiriman' => $jadwalpengiriman]);
    }

    // menambah jadwal pengiriman
    public function create(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'Tujuan' => 'required|min:5',
            'Tanggal' => 'required',
        ], $messages);

        $jadwalpengiriman = new jadwal_pengiriman([
            'Tujuan' => $request->Tujuan,
            'Tanggal' => $request->Tanggal,
        ]);
        $jadwalpengiriman->save();
        return redirect('/admin/jadwalpengiriman')->with('success', 'Data Berhasil Ditambahkan');
    }
    // update jadwal pengiriman
    function update(Request $request)
    {
        // membuat pesan validasi
        $messages = [
            'required' => ':attribute wajib diisi',
            'min' => ':attribute minimal :min karakter',
        ];
        // validasi data
        $this->validate($request, [
            'Tujuan' => 'required|min:5',
            'Tanggal' => 'required',
        ], $messages);
        $jadwalpengiriman = jadwal_pengiriman::find($request->id);
        $jadwalpengiriman->Tujuan = $request->Tujuan;
        $jadwalpengiriman->Tanggal = $request->Tanggal;
        $jadwalpengiriman->save();
        return redirect('/admin/jadwalpengiriman')->with('edit', 'Data Berhasil Diupdate');
    }
    // delete jadwal pengiriman
    function delete(Request $id)
    {
        $jadwalpengiriman = jadwal_pengiriman::find($id->id);
        $jadwalpengiriman->delete();
        return redirect('/admin/jadwalpengiriman')->with('delete', 'Data Berhasil Dihapus');
    }
    // mencari jadwal pengiriman
    function search(Request $request)
    {
        $jadwalpengiriman = jadwal_pengiriman::where('Tujuan', 'like', "%" . $request->search . "%")->paginate(10);
        return view('admin.jadwalpengiriman.jadwalpengiriman', ['jadwalpengiriman' => $jadwalpengiriman]);
    }
}
