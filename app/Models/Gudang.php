<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;

    protected $table = 'gudang';

    protected $fillable = [
        'kode_gudang', 
        'nama_gudang',
    ];

    /**
     * Get all of the penjualan for the Gudang
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function penjualan(): HasMany
    {
        return $this->hasMany(Penjualan::class, 'kode_gudang');
    }
}
