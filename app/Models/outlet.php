<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;
    // mendefinisikan nama tabel
    protected $table = 'outlets';
    // mendefinisikan primary key
    protected $primaryKey = 'id';
    // mendefinisikan field yang bisa di isi
    protected $fillable = [
        'nama_outlet',
        'alamat',
        'tlp',
        'id_pengguna'
    ];
    // mendefinisikan relasi antara tabel outlet dan tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna', 'id');
    }
    // relasi pemesanan dengan outlet
    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_outlet', 'id');
    }
    public function penerimaanBarang()
    {
        return $this->hasMany(PenerimaanBarang::class, 'id_outlet', 'id');
    }
}
