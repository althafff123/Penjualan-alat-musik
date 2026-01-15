<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = ['nama_barang', 'harga', 'stock', 'kategori_id', 'foto', 'diskon', 'deskripsi', 'berat'];
    protected $appends = ['terjual'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function keranjang()
    {
        return $this->hasMany(keranjang::class);
    }

    public function pesanans()
    {
        return $this->hasMany(pesanan::class);
    }

    public function getTerjualAttribute()
    {
        $terjual = 0;
        foreach ($this->pesanans()->whereHas('checkout', function ($q) {
            $q->where('status', '!=', '6');
        })->get() as $pesanan) {
            $terjual += $pesanan->kuantitas;
        }
        return $terjual;
    }
}
