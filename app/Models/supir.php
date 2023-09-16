<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class supir extends Model
{
    use HasFactory;
    protected $table = 'supirs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'status',
        'id_pengguna'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }
    public function pengiriman()
    {
        return $this->hasMany(pengiriman::class, 'id_supir', 'id');
    }
}
