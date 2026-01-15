<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class CheckoutPembelajaran extends Model
{
    use HasFactory, Uuid;
    protected $fillable = ['total_harga', 'tanggal', 'pelatih_id', 'pembelajaran_id', 'alamat_id', 'kecamatan_id', 'user_id', 'jam_mulai', 'jam_selesai', 'status'];
    protected $appends = ['lama' . 'is_past'];

    public function getLamaAttribute()
    {
        return (int)explode(':', $this->jam_selesai)[0] - (int)explode(':', $this->jam_mulai)[0];
    }

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
    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }
    public function pelatih()
    {
        return $this->belongsTo(Pelatih::class);
    }
    public function pesanan_pembelajarans()
    {
        return $this->hasMany(pesananPembelajaran::class, 'checkout_pembelajaran_id', 'id');
    }

    public function getIsPastAttribute()
    {
        $waktu_selesai = Carbon::parse($this->tanggal . ' ' . $this->jam_selesai);
        return $this->status == '2' && $waktu_selesai->isPast();
    }
}
