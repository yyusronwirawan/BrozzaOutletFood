<?php

namespace App\Http\Livewire;

use App\Models\barang;
use App\Models\outlet;
use App\Models\pemesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $keranjang = [];
    public $search = '';
    public $totalHarga = 0;
    public $totalitem = 0;
    public $kodePemesanan;


    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function mount()
    {
        $selectedOptions = []; // Anda perlu mengisi ini dengan daftar opsi yang dipilih
        $pesananCount = count($selectedOptions);

        // Mendapatkan tanggal saat ini
        $currentDate = date('Y-m-d');

        // Mengambil ID outlet dari input
        $user = Auth::user()->id;

        // Mendapatkan pesanancount terakhir
        $latestOrder = pemesanan::latest('created_at')->first();
        $latestKodePemesanan = $latestOrder ? $latestOrder->kode_pesanan : null;

        if ($latestKodePemesanan) {
            // Extract nomor pesanan terakhir
            $lastOrderNumber = substr($latestKodePemesanan, strrpos($latestKodePemesanan, '-') + 1);

            // Kurangi nomor pesanan terakhir dengan 1
            $nextOrderNumber = (int) $lastOrderNumber - 1;

            // Tambahkan angka terakhir secara otomatis
            $nextOrderNumber = $lastOrderNumber + 1;

            // Bentuk kode pemesanan baru dengan angka terakhir yang ditambahkan
            $this->kodePemesanan = 'PM-' . date('Ymd', strtotime($currentDate)) . '-' . $user . '-' . str_pad($nextOrderNumber, strlen($lastOrderNumber), '0', STR_PAD_LEFT);
        } else {
            // Jika tidak ada pesanan sebelumnya, bentuk kode pemesanan baru
            $this->kodePemesanan = 'PM-' . date('Ymd', strtotime($currentDate)) . '-' . $user . '-001';
        }
    }

    public function addOrder(int $id)
    {
        $barang = barang::find($id);
        $barang['jumlah_barang'] = 1;
        // if (!$this->checkArray('id', $barang->id, $this->keranjang)) {
        $this->keranjang[] = [
            'id' => $barang->id,
            // 'kode_barang' => $barang->kode_barang,
            'nama_barang' => $barang->nama_barang,
            'jumlah_barang' => $barang->jumlah_barang,
            'harga' => $barang->harga,
            'total' => ($barang->harga * $barang->jumlah_barang),
        ];
        // } else {
        //     //quantity dari keranjang id ini, quantity nya ditambah 1
        //     // $this->keranjang[$id]['jumlah_barang'] = ;
        // }

        $this->totalHarga = $this->totalHarga + $barang->harga;
        $this->totalitem = $this->totalitem + $barang->jumlah_barang;
    }
    public function removeOrder($id)
    {
        $removedItem = null;

        foreach ($this->keranjang as $key => $item) {
            if ($item['id'] === $id) {
                $removedItem = $item;
                unset($this->keranjang[$key]);
                break;
            }
        }

        if ($removedItem) {
            $this->totalitem -= $removedItem['jumlah_barang'];
            $this->totalHarga -= $removedItem['total'];
        }
    }

    public function checkArray($key, $value, $array)
    {
        foreach ($array as $k => $v) {
            if ($k === $key && $v === $value) {
                return true;
            }
        }

        return false;
    }
    public function updateTotal($index, $jumlah_barang)
    {
        $this->keranjang[$index]['jumlah_barang'] = $jumlah_barang;
        if ($jumlah_barang !== '') {
            $jumlah_barang = (int)$jumlah_barang;
            $harga = (int)$this->keranjang[$index]['harga'];
            $this->keranjang[$index]['total'] = $harga * $jumlah_barang;
        } else {
            $this->keranjang[$index]['total'] = 0;
        }
    }

    public function createOrder()
    {

        // Mendapatkan outlet berdasarkan user_id
        $outlet = outlet::where('id_pengguna', Auth::user()->id)->first();

        if (!$outlet) {
            // Jika outlet tidak ditemukan, tampilkan pesan error atau lakukan tindakan lainnya
            session()->flash('error', 'Outlet tidak ditemukan!');
            return;
        }

        // Memasukkan semua item dalam keranjang ke database
        foreach ($this->keranjang as $item) {

            pemesanan::create([
                'kode_pesanan' => $this->kodePemesanan,
                'id_barang' => $item['id'],
                'jumlah_barang' => $item['jumlah_barang'],
                'total_harga' => $item['total'],
                'id_outlet' => $outlet->id,
                'status' => 'Belum Diproses',
            ]);
        }

        // Mengosongkan keranjang setelah pesanan dibuat
        $this->keranjang = [];
        $this->totalHarga = 0;
        $this->totalitem = 0;

        // Menampilkan pesan sukses atau perintah lain setelah pesanan berhasil dibuat
        session()->flash('success', 'Pesanan berhasil dibuat!');
        return redirect(request()->header('Referer'));
    }


    public function render()
    {
        return view('livewire.order', [
            'orders' => barang::Where('nama_barang', 'like', '%' . $this->search . '%')
                ->paginate(2),
            'keranjang' => $this->keranjang
        ]);
    }
}
