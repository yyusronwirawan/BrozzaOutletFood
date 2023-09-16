<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rute extends Model
{
    use HasFactory;
    protected $table = 'rutes';
    protected $fillable = [
        'id_pengiriman',
        'status'
    ];
    public function pengiriman()
    {
        return $this->belongsTo(pengiriman::class, 'id_pengiriman', 'id');
    }
    
}
