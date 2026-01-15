<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelajaran extends Model
{
    use HasFactory;
    protected $fillable = ['nama_pembelajaran', 'tarif', 'deskripsi', 'diskon', 'pelatih_id', 'kategori_id'];
    protected $appends = ['terpesan'];

    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class);
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function pesanans()
    {
        return $this->hasMany(CheckoutPembelajaran::class, 'pembelajaran_id');
    }
    public function getTerpesanAttribute()
    {
        return $this->pesanans()->where('status', '!=', '6')->count();
    }
}
