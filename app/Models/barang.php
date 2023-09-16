<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'harga',
        'satuan',
        'kategori_id',
        'gudang_id',
        'stok_awal',
        'stok_akhir',
        'stok_masuk',
        'stok_keluar'
    ];

    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori_id');
    }
    public function gudangs()
    {
        return $this->belongsTo(gudang::class, 'gudang_id');
    }
    // Relasi one-to-many antara model barang dan sirkulasi_barang
    public function sirkulasi_barangs()
    {
        return $this->hasMany(sirkulasi_barang::class, 'id_barang');
    }
}
