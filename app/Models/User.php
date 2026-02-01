<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetCodeNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'no_hp', 'foto', 'email', 'password', 'is_admin'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class);
    }

    public function checkouts()
    {
        return $this->hasMany(Checkout::class);
    }

    public function checkout_pembelajarans()
    {
        return $this->hasMany(CheckoutPembelajaran::class);
    }

    public function getNominalPembelianAttribute()
    {
        $nominal = 0;
        foreach ($this->checkouts as $checkout) {
            $nominal += $checkout->total_harga;
        }
        foreach ($this->checkout_pembelajarans as $checkout_pembelajaran) {
            $nominal += $checkout_pembelajaran->total_harga;
        }

        return $nominal;
    }

    public function sendPasswordResetCodeNotification($code)
    {
        $this->notify(new PasswordResetCodeNotification($code));
    }
}
