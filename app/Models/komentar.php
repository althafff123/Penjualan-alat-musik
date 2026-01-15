<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;
    protected $fillable = ['komentar', 'balasan_admin', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
