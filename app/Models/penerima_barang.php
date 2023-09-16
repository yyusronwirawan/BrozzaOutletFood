<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerima_barang extends Model
{
    use HasFactory;
    protected $table = 'penerima_barangs';
    protected $fillable = [
        'Tanggal',
        'id_outlet',
        'id_pengiriman',
        'status'
    ];
    function pengiriman(){
        return $this->belongsTo(pengiriman::class, 'id_pengiriman');
    }

}
