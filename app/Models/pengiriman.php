<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    use HasFactory;
    protected $fillable = ['nama_pengirim', 'ongkir', 'courier', 'estimasi', 'checkout_id'];
    protected $table = 'pengirimans';
}
