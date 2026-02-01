<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetCode extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'code', 'expires_at'];

    public static function generateCode($email)
    {
        // Hapus kode lama untuk email ini
        self::where('email', $email)->delete();

        // Generate kode 6 digit
        $code = rand(100000, 999999);

        // Simpan kode dengan masa berlaku 10 menit
        self::create([
            'email' => $email,
            'code' => $code,
            'expires_at' => now()->addMinutes(10),
        ]);

        return $code;
    }

    public static function isValid($email, $code)
    {
        $resetCode = self::where('email', $email)
            ->where('code', $code)
            ->where('expires_at', '>', now())
            ->first();

        return $resetCode ? $resetCode : false;
    }

    public static function invalidate($email)
    {
        self::where('email', $email)->delete();
    }
}