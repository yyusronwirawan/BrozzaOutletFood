<?php

namespace App\Http\Livewire;

use App\Models\barang;
use App\Models\pemesanan;
use App\Models\sirkulasi_barang;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PengeluaranBarang extends Component
{
    use WithPagination;
    // Deklarasi properti
    protected $paginationTheme = 'bootstrap';
    public $selectedPemesanan;
    public $jumlahBarang;
    public $pemesananBarang;
    public $search = '';

    // Fungsi yang dipanggil ketika properti 'search' diubah
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Fungsi yang dipanggil saat komponen di-mount
    public function mount()
    {
        $this->selectedPemesanan = null;
        $this->jumlahBarang = null;
    }


    private function resetInput()
    {
        $this->selectedPemesanan = null;
        $this->jumlahBarang = null;
        $this->pemesananBarang = null;
    }

    public function create()
    {
        // membuat validasi data
        $messages = [
            'required' => ':attribute wajib diisi',
        ];
        // validasi data
        $this->validate([
            'selectedPemesanan' => 'required',
            'pemesananBarang.tanggal' => 'required',
        ], $messages);

        // Cek apakah pemesanan barang sudah dipilih
        if ($this->selectedPemesanan) {
            // Cek apakah stok mencukupi
            $barang = Barang::find($this->pemesananBarang['id_barang']);
            if ($barang && $barang->stok_akhir>= $this->pemesananBarang['jumlah_barang']) {
                // Lakukan proses pengeluaran barang
                $sirkulasiBarang = new sirkulasi_barang([
                    'jumlah' => $this->pemesananBarang['jumlah_barang'],
                    'tanggal' => $this->pemesananBarang['tanggal'],
                    'id_barang' => $this->pemesananBarang['id_barang'],
                    'id_pengguna' => Auth::user()->id,
                    'status_masuk_keluar' => 'barangKeluar'
                ]);

                $sirkulasiBarang->save();

                // Update stok_keluar dan stok_akhir di tabel barang
                $barang->stok_keluar += $this->pemesananBarang['jumlah_barang'];
                $barang->stok_akhir -= $this->pemesananBarang['jumlah_barang'];
                $barang->save();

                

               
                if ($this->selectedPemesanan) {
                    $pemesanan = Pemesanan::find($this->selectedPemesanan);
                    if ($pemesanan) {
                        $pemesanan->status = 'Sedang Diproses';
                        $pemesanan->save();
                    }
                }
                // Reset form input
                $this->resetInput();
                 // Redirect atau tampilkan pesan sukses
                 session()->flash('success', 'Pesanan berhasil diproses!');
            } else {

                // Jika stok tidak mencukupi
                session()->flash('error', 'Stok barang tidak mencukupi.');
                // Update status pemesanan
                if ($this->selectedPemesanan) {
                    $pemesanan = Pemesanan::find($this->selectedPemesanan);
                    if ($pemesanan) {
                        $pemesanan->status = 'Stok tidak mencukupi';
                        $pemesanan->save();
                    }
                }
            }
        } else {
            // Jika pemesanan barang belum dipilih
            session()->flash('error', 'Pilih kode pemesanan terlebih dahulu.');
        }
        return redirect(request()->header('Referer'));
    }



    // Fungsi untuk menambahkan pengeluaran berdasarkan id pemesanan
    public function addpengeluaran($id)
    {
        // Mencari pemesanan berdasarkan id
        $pemesanan = pemesanan::find($id);

        // Jika pemesanan ditemukan
        if ($pemesanan) {
            $this->pemesananBarang  = [
                'id_barang' => $pemesanan->barangs->id,
                'nama_barang' => $pemesanan->barangs->nama_barang,
                'jumlah_barang' => $pemesanan->jumlah_barang,
            ];
        } else {
            // Jika pemesanan tidak ditemukan
            $this->pemesananBarang = null;
        }

        // Uncomment baris berikut untuk menampilkan nilai $this->pemesananBarang
        // var_dump($this->pemesananBarang);
    }

    public function render()
    {
        // Mengambil data sirkulasi barangKeluar
        $query = sirkulasi_barang::where('status_masuk_keluar', 'barangKeluar');

        // Menambahkan kondisi pencarian jika $search memiliki nilai
        if ($this->search) {
            $query->whereHas('barangs', function ($q) {
                $q->where('nama_barang', 'like', '%' . $this->search . '%');
            });
        }

        // Mengambil data barangKeluar
        $BarangKeluar = $query->paginate(10);

        // Menampilkan data barang
        $Barang = barang::all();

        // Mengambil data pemesanan yang memiliki status 'Belum Diproses'
        $pemesanans = pemesanan::where('status', 'Belum Diproses')->get();

        $data = [
            'pemesanans' => $pemesanans,
            'BarangKeluar' => $BarangKeluar,
            'barangs' => $Barang,
            'pemesananBarang' => $this->pemesananBarang
        ];

        return view('livewire.pengeluaran-barang', $data);
    }
}
