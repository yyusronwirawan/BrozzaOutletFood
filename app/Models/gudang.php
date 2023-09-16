<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gudang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_gudang',
        'alamat',
    ];
    public function barangs()
    {
        return $this->hasMany(barang::class);
    }
}
