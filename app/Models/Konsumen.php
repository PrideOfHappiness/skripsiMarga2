<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = 'konsumen';

    protected $fillable = [
        'kode_customer',
        'kode_wilayah',
        'nama',
        'alamat',
        'gender',
        'no_ktp',
        'no_telp',
    ];


    public function kode_wilayah(){
        return $this->BelongsTo(Wilayah::class, 'kode_wilayah');       
    }

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'kode_customer');
    }
}

