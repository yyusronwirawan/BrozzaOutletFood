<?php

// pdf
use App\Http\Controllers\export\cetak_pdfController;

// auth
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\registerController;

// admin
use App\Http\Controllers\admin\GudangController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\pengguna\PenggunaController;
use App\Http\Controllers\admin\pengguna\SupirController;
use App\Http\Controllers\admin\pengguna\OutletController;
use App\Http\Controllers\admin\pengguna\PegawaiController;
use App\Http\Controllers\admin\KategoriController;
use App\Http\Controllers\admin\PemesananController;
use App\Http\Controllers\admin\BarangController;
use App\Http\Controllers\admin\sirkulasiBarangController;
use App\Http\Controllers\admin\HakAksesController;
use App\Http\Controllers\admin\JadwalPengirimanController;
use App\Http\Controllers\admin\TrukController;
use App\Http\Controllers\admin\PengirimanController;
use App\Http\Controllers\admin\RuteController;

// pegawai
use App\Http\Controllers\pegawai\GudangController as GudangPegawai;
use App\Http\Controllers\pegawai\DashboardController as DashboardPegawai;
use App\Http\Controllers\pegawai\OutletController as OutletPegawai;
use App\Http\Controllers\pegawai\BarangController as BarangPegawai;
use App\Http\Controllers\pegawai\SirkulasiBarangController as SirkulasiBarangPegawai;
use App\Http\Controllers\pegawai\DataPemesananController as DataPemesananPegawai;
use App\Http\Controllers\pegawai\PengirimanController as PengirimanPegawai;
use App\Http\Controllers\pegawai\JadwalPengirimanController as JadwalPengirimanPegawai;
use App\Http\Controllers\pegawai\TrukController as TrukPegawai;
use App\Http\Controllers\pegawai\RuteController as RutePegawai;
use App\Http\Controllers\pegawai\KategoriController as KategoriPegawai;
use App\Http\Controllers\pegawai\SupirController as SupirPegawai;
use App\Http\Controllers\pegawai\DataPenerimaBarangController as DataPenerimaBarangPegawai;

// outlet
use App\Http\Controllers\outlet\PemesananController as PemesananOutlet;
use App\Http\Controllers\outlet\StokBarangController;
use App\Http\Controllers\outlet\PenerimaanBarangController;
use App\Http\Controllers\outlet\DashboardController as DashboardOutlet;
use App\Http\Controllers\outlet\DatapemesanController as DatapemesanOutlet;

// supir
use App\Http\Controllers\supir\PengirimanController as PengirimanSupir;
use App\Http\Controllers\supir\RuteController as RuteSupir;
use App\Http\Controllers\supir\TrukController as TrukSupir;
use App\Http\Controllers\supir\JadwalPengirimanController as JadwalPengirimanSupir;
use App\Http\Controllers\supir\DashboardController as DashboardSupir;

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/konfirmasi', function () {
    return view('konfirmasi');
});

// bagian login 
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login/proses', 'proses')->name('login_proses');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/login/register', [registerController::class, 'index'])->name('register');
Route::post('/login/register/actionregister', [registerController::class, 'actionregister'])->name('actionregister');

// Bagian Export pdf
Route::controller(cetak_pdfController::class)->group(function () {
    route::get('/export/jadwalpengiriman', 'cetak_jadwal')->name('exportjadwalpengiriman');
    route::get('/export/barang', 'cetakbarang')->name('exportbarang');
    route::get('/export/gudang', 'cetakgudang')->name('exportgudang');
    route::get('/export/supir', 'cetaksupir')->name('exportsupir');
    route::get('/export/truk', 'cetaktruk')->name('exporttruk');
    route::get('/export/rute', 'cetakrute')->name('exportrute');
    route::get('/export/kategori', 'cetakkategori')->name('exportkategori');
    route::get('/export/pengiriman', 'cetakpengiriman')->name('exportpengiriman');
    route::get('/export/outlet', 'cetakoutlet')->name('exportoutlet');
    route::get('/export/barangmasuk', 'cetakbarangmasuk')->name('exportbarangmasuk');
    route::get('/export/barangkeluar', 'cetakbarangkeluar')->name('exportbarangkeluar');
    route::get('/export/pemesanan', 'cetakpemesanan')->name('exportpemesanan');
    // route::get('/export/pengguna', 'cetakpengguna')->name('exportpengguna');
    route::get('/export/pegawai', 'cetakpegawai')->name('exportpegawai');
    route::get('/export/penerimabarang', 'cetakpenerimabarang')->name('exportpenerimabarang');
});

// bagian admin
Route::group(['middleware' => ['IsAdmin']], function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/admin/dashboard', [DashboardController::class, 'search'])->name('dashboard.search.admin');

    // Bagian Rute 
    Route::get('/admin/rute', function () {
        return view('admin.Rute.rute');
    });

    // Bagian Jadwal
    Route::controller(JadwalPengirimanController::class)->group(function () {
        Route::get('/admin/jadwalpengiriman', 'index')->name('jadwalpengiriman');
        Route::post('/admin/jadwalpengiriman/create', 'create')->name('jadwalpengiriman.create');
        Route::post('/admin/jadwalpengiriman/update', 'update')->name('jadwalpengiriman.update');
        Route::get('/admin/jadwalpengiriman/delete/{id}', 'delete')->name('jadwalpengiriman.delete');
        Route::get('/admin/jadwalpengiriman', 'search')->name('jadwalpengiriman.search');
    });

    // Bagian Truk
    Route::controller(TrukController::class)->group(function () {
        Route::get('/admin/truk', 'index')->name('truk');
        Route::post('/admin/truk/create', 'create')->name('truk.create');
        Route::post('/admin/truk/update', 'update')->name('truk.update');
        Route::get('/admin/truk/delete', 'delete')->name('truk.delete');
        Route::get('/admin/truk', 'search')->name('truk.search');
    });

    // Bagian Gudang
    Route::controller(GudangController::class)->group(function () {
        Route::get('/admin/gudang', 'index')->name('gudang');
        Route::post('/admin/gudang/create', 'create')->name('gudang.create');
        Route::put('/admin/gudang/update', 'update')->name('gudang.update');
        Route::get('/admin/gudang/delete/{id}', 'delete')->name('gudang.delete');
        Route::get('/admin/gudang', 'search')->name('gudang.search');
    });

    // Bagian Kategori
    Route::controller(KategoriController::class)->group(function () {
        Route::get('/admin/kategori', 'index')->name('kategori');
        Route::post('/admin/kategori/create', 'create')->name('kategori.create');
        Route::put('/admin/kategori/update', 'update')->name('kategori.update');
        Route::get('/admin/kategori/delete', 'delete')->name('kategori.delete');
        Route::get('/admin/kategori', 'search')->name('kategori.search');
        Route::get('/admin/kategori/cetak', 'cetak')->name('kategori.cetak');
    });

    // Bagian Barang
    Route::controller(BarangController::class)->group(function () {
        Route::get('/admin/Databarang', 'index')->name('barang');
        Route::post('/admin/Databarang/create', 'create')->name('barang.create');
        Route::put('/admin/Databarang/update', 'update')->name('barang.update');
        Route::get('/admin/Databarang/delete/{id}', 'delete')->name('barang.delete');
        Route::get('/admin/Databarang', 'search')->name('barang.search');
    });

    // Bagian Sirkulasi Barang
    Route::controller(sirkulasiBarangController::class)->group(function () {
        Route::get('/admin/barangMasuk', 'indexBrgMasuk')->name('barangMasuk');
        Route::post('/admin/barangMasuk/create', 'createBrgMasuk')->name('barangMasuk.create');
        Route::put('/admin/barangMasuk/update/', 'updateBrgMasuk')->name('barangMasuk.update');
        Route::get('/admin/barangMasuk/delete/', 'deleteBrgMasuk')->name('barangMasuk.delete');
        Route::get('/admin/barangMasuk', 'searchBrgMasuk')->name('barangMasuk.search');

        Route::get('/admin/barangKeluar', 'indexBrgKeluar')->name('barangKeluar');
        // Route::post('/admin/barangKeluar/create', 'createBrgKeluar')->name('barangKeluar.create');
        // Route::put('/admin/barangKeluar/update', 'updateBrgKeluar')->name('barangKeluar.update');
        // Route::get('/admin/barangKeluar/delete', 'deleteBrgKeluar')->name('barangKeluar.delete');
        // Route::get('/admin/barangKeluar', 'searchBrgKeluar')->name('barangKeluar.search');
    });

    // Bagian Hak Akses
    Route::controller(HakAksesController::class)->group(function () {
        Route::get('/admin/hakAkses', 'index')->name('hakAkses');
        Route::post('/admin/hakAkses/create', 'create')->name('hakAkses.create');
    });

    // Bagian Pengguna
    Route::controller(PenggunaController::class)->group(function () {
        route::get('/admin/pengguna', 'index')->name('pengguna');
        route::post('/admin/pengguna/create', 'create')->name('pengguna.create');
        route::post('/admin/pengguna/update', 'update')->name('pengguna.update');
        route::get('/admin/pengguna/delete', 'delete')->name('pengguna.delete');
        route::get('/admin/pengguna', 'search')->name('pengguna.search');
    });
    // Bagian Supir
    Route::controller(SupirController::class)->group(function () {
        route::get('/admin/supir', 'index')->name('supir');
        route::post('/admin/supir/create', 'tambahIdPengguna')->name('supir.create');
        route::post('/admin/supir/update', 'update')->name('supir.update');
        route::get('/admin/supir/delete', 'hapusIdPengguna')->name('supir.delete');
        route::get('/admin/supir', 'search')->name('supir.search');
    });
    // Bagian outlet
    Route::controller(OutletController::class)->group(function () {
        route::get('/admin/outlet', 'index')->name('outlet');
        route::post('/admin/outlet/create', 'create')->name('outlet.create');
        route::post('/admin/outlet/update', 'update')->name('outlet.update');
        route::get('/admin/outlet/delete', 'delete')->name('outlet.delete');
        route::get('/admin/outlet', 'search')->name('outlet.search');
    });
    // Bagian Pegawai
    Route::controller(PegawaiController::class)->group(function () {
        route::get('/admin/pegawai', 'index')->name('pegawai');
        route::post('/admin/pegawai/create', 'create')->name('pegawai.create');
        route::post('/admin/pegawai/update', 'update')->name('pegawai.update');
        route::get('/admin/pegawai/delete', 'delete')->name('pegawai.delete');
        route::get('/admin/pegawai', 'search')->name('pegawai.search');
    });
    // Bagian pemesanan
    Route::controller(PemesananController::class)->group(function () {
        route::get('/admin/pemesanan', 'index')->name('pemesanan');
        route::get('/admin/pemesanan/delete/{id}', 'delete')->name('pemesanan.delete');
        route::get('/admin/pemesanan', 'search')->name('pemesanan.search');
    });
    // Bagian Pengiriman
    Route::controller(PengirimanController::class)->group(function () {
        route::get('/admin/pengiriman', 'index')->name('pengiriman');
        route::get('/admin/pengiriman/delete', 'delete')->name('pengiriman.delete');
        route::post('/admin/pengiriman/create', 'create')->name('pengiriman.create');
        route::post('/admin/pengiriman/update', 'update')->name('pengiriman.update');
        route::get('/admin/pengiriman', 'search')->name('pengiriman.search');
    });
    // Bagian Rute
    Route::controller(RuteController::class)->group(function () {
        route::get('/admin/rute', 'index')->name('rute');
        route::post('/admin/rute/create', 'create')->name('rute.create');
        route::post('/admin/rute/update', 'update')->name('rute.update');
        route::get('/admin/rute/delete', 'delete')->name('rute.delete');
        route::get('/admin/rute', 'search')->name('rute.search');
    });
});

// Bagian Outlet
route::group(['middleware' => ['IsOutlet']], function () {
    // Bagian Dashboard
    Route::controller(DashboardOutlet::class)->group(function () {
        route::get('/outlet/dashboard', 'index')->name('dashboard.outlet');
        route::post('/outlet/dashboard', 'cariStatus')->name('dashboard.search');
    });
    // Bagian Pemesanan
    Route::controller(PemesananOutlet::class)->group(function () {
        route::get('/outlet/pemesanan', 'index')->name('pemesanan');
    });
    // Bagian Barang
    Route::controller(StokBarangController::class)->group(function () {
        Route::get('/outlet/Databarang', 'index')->name('tampilan.barang');
        Route::post('/outlet/Databarang', 'search')->name('barang.cari');
    });
    // Bagian Penerimaan Barang
    route::controller(PenerimaanBarangController::class)->group(function () {
        route::get('/outlet/penerimaanBarang', 'index')->name('penerimaanBarang.outlet');

        // route::post('/outlet/penerimaanBarang/create', 'create')->name('penerimaanBarang.create');
        route::put('/outlet/penerimaanBarang/update', 'update')->name('penerimaanBarang.update');
        // route::get('/outlet/penerimaanBarang/delete', 'delete')->name('penerimaanBarang.delete');
        route::get('/outlet/penerimaanBarang', 'search')->name('penerimaanBarang.search.outlet');
    });
    // data pemesanan
    route::controller(DatapemesanOutlet::class)->group(function () {
        route::get('/outlet/datapemesanan', 'index')->name('dataPemesanan.outlet');
        route::get('/outlet/datapemesanan', 'search')->name('dataPemesanan.search.outlet');
    });
});

// Bagian Pegawai
route::group(['middleware' => ['IsPegawai']], function () {
    // Bagian Dashboard
    Route::controller(DashboardPegawai::class)->group(function () {
        route::get('/pegawai/dashboard', 'index')->name('dashboard.pegawai');
        route::post('/pegawai/dashboard', 'search')->name('dashboard.search.pegawai');
    });
    // Bagian Gudang
    Route::controller(GudangPegawai::class)->group(function () {
        Route::get('/pegawai/gudang', 'tampilan')->name('gudang.index');
        Route::post('/pegawai/gudang/create', 'create')->name('gudang.tambah');
        Route::put('/pegawai/gudang/update', 'update')->name('gudang.perbarui');
        Route::get('/pegawai/gudang/delete', 'delete')->name('gudang.hapus');
        Route::get('/pegawai/gudang', 'search')->name('gudang.cari');
    });
    // Bagian Outlet
    Route::controller(OutletPegawai::class)->group(function () {
        Route::get('/pegawai/outlet', 'index')->name('outlet.pegawai');
        Route::post('/pegawai/outlet/create', 'create')->name('outlet.create.pegawai');
        Route::post('/pegawai/outlet/update', 'update')->name('outlet.update.pegawai');
        Route::get('/pegawai/outlet/delete', 'delete')->name('outlet.delete.pegawai');
        Route::get('/pegawai/outlet', 'search')->name('outlet.search.pegawai');
    });
    // Bagian Barang
    Route::controller(BarangPegawai::class)->group(function () {
        Route::get('/pegawai/Databarang', 'index')->name('barang.pegawai');
        Route::post('/pegawai/Databarang/create', 'create')->name('barang.create.pegawai');
        Route::put('/pegawai/Databarang/update', 'update')->name('barang.update.pegawai');
        Route::get('/pegawai/Databarang/delete', 'delete')->name('barang.delete.pegawai');
        Route::get('/pegawai/Databarang', 'search')->name('barang.search.pegawai');
    });
    // Bagian Sirkulasi Barang
    Route::controller(SirkulasiBarangPegawai::class)->group(function () {
        Route::get('/pegawai/barangMasuk', 'indexBrgMasuk')->name('barangMasuk.pegawai');
        Route::post('/pegawai/barangMasuk/create', 'createBrgMasuk')->name('barangMasuk.create.pegawai');
        Route::put('/pegawai/barangMasuk/update', 'updateBrgMasuk')->name('barangMasuk.update.pegawai');
        Route::get('/pegawai/barangMasuk/delete', 'deleteBrgMasuk')->name('barangMasuk.delete.pegawai');
        Route::get('/pegawai/barangMasuk', 'searchBrgMasuk')->name('barangMasuk.search.pegawai');

        Route::get('/pegawai/barangKeluar', 'indexBrgKeluar')->name('barangKeluar.pegawai');
        // Route::post('/pegawai/barangKeluar/create', 'createBrgKeluar')->name('barangKeluar.create.pegawai');
        // Route::put('/pegawai/barangKeluar/update', 'updateBrgKeluar')->name('barangKeluar.update.pegawai');
        // Route::get('/pegawai/barangKeluar/delete', 'deleteBrgKeluar')->name('barangKeluar.delete.pegawai');
        // Route::get('/pegawai/barangKeluar', 'searchBrgKeluar')->name('barangKeluar.search.pegawai');
    });
    // Bagian data pemesanan
    Route::controller(DataPemesananPegawai::class)->group(function () {
        route::get('/pegawai/pemesanan', 'index')->name('pemesanan.pegawai');
        route::get('/pegawai/pemesanan', 'search')->name('pemesanan.search.pegawai');
    });
    // Bagian data pengiriman
    Route::controller(PengirimanPegawai::class)->group(function () {
        route::get('/pegawai/pengiriman', 'index')->name('pengiriman.pegawai');
        route::get('/pegawai/pengiriman/delete', 'delete')->name('pengiriman.delete.pegawai');
        route::post('/pegawai/pengiriman/create', 'create')->name('pengiriman.create.pegawai');
        route::post('/pegawai/pengiriman/update', 'update')->name('pengiriman.update.pegawai');
        route::get('/pegawai/pengiriman', 'search')->name('pengiriman.search.pegawai');
    });
    // Bagian Jadwal pengiriman
    Route::controller(JadwalPengirimanPegawai::class)->group(function () {
        route::get('/pegawai/jadwalPengiriman', 'index')->name('jadwalPengiriman.pegawai');
        route::get('/pegawai/jadwalPengiriman/delete', 'delete')->name('jadwalPengiriman.delete.pegawai');
        route::post('/pegawai/jadwalPengiriman/create', 'create')->name('jadwalPengiriman.create.pegawai');
        route::post('/pegawai/jadwalPengiriman/update', 'update')->name('jadwalPengiriman.update.pegawai');
        route::get('/pegawai/jadwalPengiriman', 'search')->name('jadwalPengiriman.search.pegawai');
    });
    // Bagian TRuk
    Route::controller(TrukPegawai::class)->group(function () {
        route::get('/pegawai/truk', 'index')->name('truk.pegawai');
        route::get('/pegawai/truk/delete', 'delete')->name('truk.delete.pegawai');
        route::post('/pegawai/truk/create', 'create')->name('truk.create.pegawai');
        route::post('/pegawai/truk/update', 'update')->name('truk.update.pegawai');
        route::get('/pegawai/truk', 'search')->name('truk.search.pegawai');
    });
    // Bagian Rute
    Route::controller(RutePegawai::class)->group(function () {
        route::get('/pegawai/rute', 'index')->name('rute.pegawai');
        // route::get('/pegawai/rute/delete', 'delete')->name('rute.delete.pegawai');
        // route::post('/pegawai/rute/create', 'create')->name('rute.create.pegawai');
        route::post('/pegawai/rute/update', 'update')->name('rute.update.pegawai');
        route::get('/pegawai/rute', 'search')->name('rute.search.pegawai');
    });
    // Bagian Kategori
    Route::controller(KategoriPegawai::class)->group(function () {
        route::get('/pegawai/kategori', 'index')->name('kategori.pegawai');
        route::get('/pegawai/kategori/delete', 'delete')->name('kategori.delete.pegawai');
        route::post('/pegawai/kategori/create', 'create')->name('kategori.create.pegawai');
        route::post('/pegawai/kategori/update', 'update')->name('kategori.update.pegawai');
        route::get('/pegawai/kategori', 'search')->name('kategori.search.pegawai');
    });
    // Bagian data Supir
    Route::controller(SupirPegawai::class)->group(function () {
        route::get('/pegawai/supir', 'index')->name('supir.pegawai');
        route::get('/pegawai/supir/delete', 'hapusIdPengguna')->name('supir.delete.pegawai');
        route::post('/pegawai/supir/create', 'tambahIdPengguna')->name('supir.create.pegawai');
        route::post('/pegawai/supir/update', 'update')->name('supir.update.pegawai');
        route::get('/pegawai/supir', 'search')->name('supir.search.pegawai');
    });
    // Bagian data Penerima Barang
    Route::controller(DataPenerimaBarangPegawai::class)->group(function () {
        route::get('/pegawai/penerimaanbarang', 'index')->name('penerimaBarang.pegawai');
        // route::get('/pegawai/penerimaanbarang/delete', 'delete')->name('penerimaBarang.delete.pegawai');
        // route::post('/pegawai/penerimaanbarang/create', 'create')->name('penerimaBarang.create.pegawai');
        // route::post('/pegawai/penerimaanbarang/update', 'update')->name('penerimaBarang.update.pegawai');
        route::get('/pegawai/penerimaanbarang', 'search')->name('penerimaBarang.search.pegawai');
    });
});

// Bagian Supir
route::group(['middleware' => ['IsSupir']], function () {
    Route::controller(DashboardSupir::class)->group(function () {
        route::get('/supir/dashboard', 'index')->name('dashboardsupir');
        route::post('/supir/dashboard', 'search')->name('dashboard.search.supir');
    });
    // Bagian Pengiriman
    Route::controller(PengirimanSupir::class)->group(function () {
        route::get('/supir/pengiriman', 'index')->name('pengiriman.supir');
        route::get('/supir/pengiriman/delete', 'delete')->name('pengiriman.delete.supir');
        route::post('/supir/pengiriman/create', 'create')->name('pengiriman.create.supir');
        route::post('/supir/pengiriman/update', 'update')->name('pengiriman.update.supir');
        route::get('/supir/pengiriman', 'search')->name('pengiriman.search.supir');
    });
    // Bagian Rute 
    Route::controller(RuteSupir::class)->group(function () {
        route::get('/supir/rute', 'index')->name('rute.supir');
        route::post('/supir/rute/create', 'create')->name('rute.create.supir');
        route::post('/supir/rute/update', 'update')->name('rute.update.supir');
        route::get('/supir/rute/delete', 'delete')->name('rute.delete.supir');
        route::get('/supir/rute', 'search')->name('rute.search.supir');
    });
    // Bagian Truk
    Route::controller(TrukSupir::class)->group(function () {
        route::get('/supir/truk', 'index')->name('truk.supir');
        route::post('/supir/truk/create', 'create')->name('truk.create.supir');
        route::post('/supir/truk/update', 'update')->name('truk.update.supir');
        route::get('/supir/truk/delete', 'delete')->name('truk.delete.supir');
        route::get('/supir/truk', 'search')->name('truk.search.supir');
    });
    // Bagian Jadwal Pengiriman
    Route::controller(JadwalPengirimanSupir::class)->group(function () {
        route::get('/supir/jadwalPengiriman', 'index')->name('jadwalPengiriman.supir');
        route::get('/supir/jadwalPengiriman', 'search')->name('jadwalPengiriman.search.supir');
    });
});
