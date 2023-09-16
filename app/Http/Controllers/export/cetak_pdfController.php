<?php

namespace App\Http\Controllers\export;

use App\Http\Controllers\Controller;
use App\Models\barang;
use App\Models\gudang;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\jadwal_pengiriman;
use App\Models\outlet;
use App\Models\pegawai;
use App\Models\pemesanan;
use App\Models\penerima_barang;
use App\Models\pengiriman;
use App\Models\sirkulasi_barang;
use App\Models\supir;
use App\Models\truk;
use App\Models\User;
use Illuminate\Http\Request;

class cetak_pdfController extends Controller
{
    // bagian jadwal
    public function cetak_jadwal()
    {
        $jadwalpengiriman = jadwal_pengiriman::all();

        $pdf = PDF::loadView('export.cetak_jadwalPengiriman', compact('jadwalpengiriman'));

        return $pdf->download('data_jadwal_pengiriman.pdf');
    }
    // bagian barang
    public function cetakbarang()
    {
        $barangs = barang::all();

        $pdf = PDF::loadView('export.Barang_Pdf', compact('barangs'));

        return $pdf->download('data_barang.pdf');
    }
    // bagian gudang
    function cetakgudang()
    {
        $gudangs = gudang::all();
        $pdf = PDF::loadview('export.gudang_pdf', ['gudangs' => $gudangs]);
        return $pdf->download('laporan-gudang-pdf');
    }
    // supir
    public function cetaksupir()
    {
        $supir = supir::all();

        $pdf = PDF::loadView('export.Datasupir_Pdf', ['supir' => $supir]);

        return $pdf->download('data_supir.pdf');
    }
    // Method untuk mencetak data outlet ke file PDF
    public function cetakoutlet()
    {
        $outlet = outlet::all();

        $pdf = PDF::loadView('export.outlet_pdf', ['outlet' => $outlet]);

        return $pdf->download('data_outlet.pdf');
    }
    // tambahan fungsi untuk mencetak barang masuk
    public function cetakbarangmasuk()
    {
        $BarangMasuk = sirkulasi_barang::where('status_masuk_keluar', 'barangMasuk')->get();
        $Barang = barang::all();

        $data = [
            'BarangMasuk' => $BarangMasuk,
            'barangs' => $Barang
        ];

        $pdf = PDF::loadView('export.cetakBarangMasuk_pdf', $data);

        return $pdf->download('cetak_barang_masuk.pdf');
    }
    public function cetakbarangkeluar()
    {
        $BarangKeluar = sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar')->get();
        $Barang = barang::all();

        $data = [
            'BarangKeluar' => $BarangKeluar,
            'barangs' => $Barang
        ];

        $pdf = PDF::loadView('export.cetakBarangKeluar_pdf', $data);

        return $pdf->download('cetak_barang_Keluar.pdf');
    }
    public function cetakpegawai()
    {
        $pengguna = User::where('pegawai_id', '2')->where('status', 'Terkonfirmasi')->paginate(10);
        $hakAkses = pegawai::all();

        $data = [
            'pengguna' => $pengguna,
            'hakAkses' => $hakAkses
        ];

        $pdf = PDF::loadView('export.data_pegawai_pdf', $data);
        return $pdf->download('data_pegawai.pdf');
    }
    public function cetakpemesanan()
    {
        $pemesanan = pemesanan::where('status', '!=', 'batal')->get();

        $pdf = PDF::loadView('export.pemesanan_pdf', compact('pemesanan'));

        return $pdf->download('data_pemesanan.pdf');
    }

    public function cetakpengiriman()
    {
        $pengiriman = pengiriman::all();

        $pdf = PDF::loadView('export.pengiriman_pdf', compact('pengiriman'));

        return $pdf->download('data_pengiriman.pdf');
    }
    public function cetaktruk()
    {
        $truk = truk::all();

        $pdf = PDF::loadView('export.truk_pdf', compact('truk'));

        return $pdf->download('data_truk.pdf');
    }
    public function cetakpenerimabarang(){
        $penerimaBarangs = penerima_barang::all();
        $data=[
            'penerimaBarangs'=>$penerimaBarangs
        ];
        $pdf = PDF::loadView('export.penerimaanBarang_pdf', $data);
        return $pdf->download('data_penerimaan_barang.pdf');
    }

}
