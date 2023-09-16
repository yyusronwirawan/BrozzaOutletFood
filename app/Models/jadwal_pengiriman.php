<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal_pengiriman extends Model
{
    use HasFactory;
    protected $table = 'jadwal_pengirimen';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Tujuan',
        'Tanggal'
    ];
}
