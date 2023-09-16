<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable=['nama_kategori'];

    public function barangs()
    {
        return $this->hasMany(barang::class);
    }
    
}
