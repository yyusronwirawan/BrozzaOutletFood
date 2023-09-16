<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\jadwal_pengiriman;
use App\Models\pemesanan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\penerima_barang;
use App\Models\pengiriman;
use App\Models\rute;
use App\Models\supir;
use App\Models\truk;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    function index()
    {
        $truk = truk::all();
        $supir = supir::all();
        $jadwal = jadwal_pengiriman::all();
        // Mengambil array id_pemesanan yang sudah ada dalam tabel pengiriman
        $existingIds = pengiriman::pluck('id_pemesanan')->all();

        // Mengambil pemesanan yang belum ada dalam tabel pengiriman berdasarkan id
        $pemesanan = pemesanan::whereNotIn('id', $existingIds)->get();
        $pengiriman = pengiriman::all();
        // Dalam konteks $groupedPengiriman, pemesanan.kode_pesanan mengacu pada properti kode_pesanan pada relasi pemesanan dalam model pengiriman.
        $groupedPengiriman = $pengiriman->groupBy('pemesanan.kode_pesanan');
        $data = [
            'truk' => $truk,
            'jadwal' => $jadwal,
            'pemesanan' => $pemesanan,
            'pengiriman' => $groupedPengiriman,
            'supir' => $supir
        ];
        return view('pegawai.Pengiriman.pengiriman', $data);
    }
    function create(Request $request)
    {
        $supir = supir::where('id', $request->id_supir)->first();
        $messages = [
            'required' => ':attribute wajib diisi!',
        ];
        $this->validate($request, [
            'id_jadwal_pengiriman' => 'required',
            'kode_pesanan' => 'required',
            'id_truk' => 'required'
        ], $messages);
        $pemesanans = pemesanan::where('kode_pesanan', $request->kode_pesanan)->get();

        foreach ($pemesanans as $pemesanan) {
            $pemesanan->status = 'Dalam Pengiriman';
            $pemesanan->save();
            $pengiriman = pengiriman::create([
                'id_jadwal_pengiriman' => $request->id_jadwal_pengiriman,
                'id_pemesanan' => $pemesanan->id,
                'id_truk' => $request->id_truk,
                'id_supir' => $supir->id,
                'status_pengiriman' => 'Dalam Pengiriman'
            ]);
            // Membuat rute baru berdasarkan pengiriman yang baru dibuat
            rute::create([
                'id_pengiriman' => $pengiriman->id,
                'status' => 'Dalam Pengiriman'
            ]);
            // Membuat penerimaan barang baru berdasarkan pengiriman yang baru dibuat
            penerima_barang::create([
                'Tanggal' => date('Y-m-d'), // Tanggal saat ini
                'id_outlet' => $pemesanan->id_outlet,
                'id_pengiriman' => $pengiriman->id,
                'status' => 'Belum Diterima'
            ]);
        }
        return redirect('/pegawai/pengiriman')->with('success', 'Data Berhasil Ditambahkan');
    }
    function update(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
        ];
        $this->validate($request, [
            'id_jadwal_pengiriman' => 'required',
            'id_truk' => 'required',
        ], $messages);

        // Mengambil semua pengiriman yang memiliki kode pesanan yang sama
        $pengiriman = pengiriman::whereHas('pemesanan', function ($query) use ($request) {
            $query->where('kode_pesanan', $request->kode_pesanan);
        })->get();

        foreach ($pengiriman as $item) {
            $item->id_jadwal_pengiriman = $request->id_jadwal_pengiriman;
            $item->id_truk = $request->id_truk;
            $item->save();
        }
        return redirect('/pegawai/pengiriman')->with('edit', 'Status Pengiriman Berhasil Diubah');
    }
    public function delete(Request $request)
    {
        $kodePesanan = $request->kode_pesanan;

        // Mengupdate status pemesanan
        pemesanan::where('kode_pesanan', $kodePesanan)
            ->update(['status' => 'Sedang Diproses']);

        // Mengambil semua pengiriman yang memiliki kode pesanan yang sama
        $pengiriman = pengiriman::whereHas('pemesanan', function ($query) use ($request) {
            $query->where('kode_pesanan', $request->kode_pesanan);
        })->get();

        foreach ($pengiriman as $item) {
            // Menghapus penerima barang yang terkait dengan pengiriman
            $penerimaBarang = penerima_barang::where('id_pengiriman', $item->id)->first();
            if ($penerimaBarang) {
                $penerimaBarang->delete();
            }

            // Menghapus rute yang terkait dengan pengiriman
            rute::where('id_pengiriman', $item->id)->delete();

            // Menghapus pengiriman
            $item->delete();
        }
        return redirect('/pegawai/pengiriman')->with('delete', 'Data Berhasil Dihapus');
    }
    public function search(Request $request)
    {
        $supir = supir::all();
        $search = $request->input('search');

        // Mengambil pengiriman berdasarkan kode pesanan yang sesuai dengan search pencarian
        $pengiriman = pengiriman::whereHas('pemesanan', function ($query) use ($search) {
            $query->where('kode_pesanan', 'like', '%' . $search . '%');
        })->paginate(10);

        // Mengambil data lain yang diperlukan untuk tampilan
        $truk = truk::all();
        $jadwal = jadwal_pengiriman::all();
        $existingIds = pengiriman::pluck('id_pemesanan')->all();
        $pemesanan = pemesanan::whereNotIn('id', $existingIds)->get();
        $groupedPengiriman = $pengiriman->groupBy('pemesanan.kode_pesanan');

        $data = [
            'truk' => $truk,
            'jadwal' => $jadwal,
            'pemesanan' => $pemesanan,
            'pengiriman' => $groupedPengiriman,
            'supir' => $supir
        ];

        return view('pegawai.Pengiriman.pengiriman', $data);
    }
}
