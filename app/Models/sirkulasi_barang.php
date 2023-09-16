<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sirkulasi_barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'jumlah',
        'tanggal',
        'id_barang',
        'id_pengguna',
        'status_masuk_keluar'
    ];
    // Relasi many-to-one antara model sirkulasi_barang dan barang
    public function barangs()
    {
        return $this->belongsTo(barang::class, 'id_barang','id');
    }
    // Relasi many-to-one antara model sirkulasi_barang dan User
    public function users()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
    
}
