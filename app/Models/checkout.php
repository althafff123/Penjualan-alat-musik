<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Checkout extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['user_id', 'no_invoice', 'alamat_id', 'kecamatan_id', 'pengiriman_id', 'total_harga', ''];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    public function pengiriman()
    {
        return $this->hasOne(Pengiriman::class);
    }

    public function pesanans()
    {
        return $this->hasMany(pesanan::class);
    }
}
