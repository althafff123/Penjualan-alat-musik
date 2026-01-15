<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $fillable = ['subtotal', 'kuantitas', 'barang_id', 'checkout_id'];
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
