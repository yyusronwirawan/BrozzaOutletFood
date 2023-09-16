<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengirimen';
    protected $fillable = [
        'id_jadwal_pengiriman',
        'id_pemesanan',
        'id_truk',
        'id_supir',
        'status_pengiriman'
    ];
    public function jadwal_pengiriman()
    {
        return $this->belongsTo(jadwal_pengiriman::class, 'id_jadwal_pengiriman', 'id');
    }
    public function pemesanan()
    {
        return $this->belongsTo(pemesanan::class, 'id_pemesanan', 'id');
    }
    public function truk()
    {
        return $this->belongsTo(truk::class, 'id_truk', 'id');
    }
    public function supir()
    {
        return $this->belongsTo(supir::class, 'id_supir', 'id');
    }


}
