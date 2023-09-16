<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\rute;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        // Mengambil semua data rute dengan data pengiriman dan pemesanan terkait
        $rutes = rute::with('pengiriman.pemesanan')->get();

        // Mengelompokkan rute berdasarkan kode_pesanan untuk tampilan yang lebih mudah di view
        $groupedRutes = $rutes->groupBy('pengiriman.pemesanan.kode_pesanan');

        $data = [
            'rute' => $groupedRutes
        ];

        return view('pegawai.Rute.rute', $data);
    }

    public function search(Request $request)
    {
        // Mengambil data yang dikirimkan melalui form pencarian
        $search = $request->input('search');

        // Melakukan pencarian rute berdasarkan kode pesanan yang sesuai dengan pencarian
        $rutes = rute::with('pengiriman.pemesanan')
            ->whereHas('pengiriman.pemesanan', function ($query) use ($search) {
                $query->where('kode_pesanan', 'like', '%' . $search . '%');
            })
            ->get();

        // Mengelompokkan rute hasil pencarian berdasarkan kode_pesanan
        $groupedRutes = $rutes->groupBy('pengiriman.pemesanan.kode_pesanan');

        $data = [
            'rute' => $groupedRutes
        ];

        return view('pegawai.Rute.rute', $data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'kode_pesanan' => 'required',
            'status' => 'required|in:Dalam Perjalanan menuju tujuan,Sampai di tujuan,Batal'
        ]);

        $kodePesanan = $request->kode_pesanan;
        $status = $request->status;

        // Mengambil rute berdasarkan kode pesanan
        $rutes = Rute::whereHas('pengiriman.pemesanan', function ($query) use ($kodePesanan) {
            $query->where('kode_pesanan', $kodePesanan);
        })->get();

        // Jika rute ditemukan, perbarui statusnya
        foreach ($rutes as $rute) {
            $rute->status = $status;
            $rute->save();

            // Perbarui juga status pada pengiriman terkait
            $rute->pengiriman->status_pengiriman = $status;
            $rute->pengiriman->save();

            // Perbarui juga status pemesanan yang terkait
            $pemesanan = $rute->pengiriman->pemesanan;
            $pemesanan->status = $status;
            $pemesanan->save();
        }

        return redirect('/pegawai/rute')->with('edit', 'Status rute berhasil diperbarui.');
    }
    public function delete(Request $request)
    {
        $kodePesanan = $request->kode_pesanan;

        // Menghapus rute berdasarkan kode pesanan
        $rutes = rute::whereHas('pengiriman.pemesanan', function ($query) use ($kodePesanan) {
            $query->where('kode_pesanan', $kodePesanan);
        })->get();

        // Menghapus setiap rute dan pengiriman yang ditemukan
        foreach ($rutes as $rute) {
            // Perbarui juga status pemesanan yang terkait
            $pemesanan = $rute->pengiriman->pemesanan;
            $pemesanan->status = 'Batal';
            $pemesanan->save();

            $pengiriman = $rute->pengiriman;
            $rute->delete();
            $pengiriman->delete();
        }

        return redirect('/pegawai/rute')->with('delete', 'Rute dan pengiriman berhasil dihapus.');
    }
}
