<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_pesanan',
        'id_barang',
        'jumlah_barang',
        'total_harga',
        'id_outlet',
        'status'
    ];
    // membuat relasi one to many dengan tabel barang
    public function barangs()
    {
        return $this->belongsTo(barang::class, 'id_barang', 'id');
    }
    // membuat relasi one to many dengan tabel outlet
    public function outlet()
    {
        return $this->belongsTo(outlet::class, 'id_outlet', 'id');
    }
}
