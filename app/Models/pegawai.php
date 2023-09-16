<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawais';
    protected $primaryKey = 'id';
    protected $fillable = [
        'hakakses'
    ];
    // membuat relasi one to many dengan tabel user
    public function users()
    {
        return $this->hasMany(User::class, 'pegawai_id', 'id');
    }
    
}
