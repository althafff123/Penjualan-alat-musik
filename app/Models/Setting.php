<?php

namespace App\Models;

use App\Traits\Uuid;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use Uuid;

    protected $fillable = [
        'uuid', 'email', 'no_whatsapp', 'facebook', 'instagram', 'youtube', 'twitter', 'logo_utama', 'logo_navbar', 'banner_utama', 'logo_footer', 'logo_login', 'logo_register'
    ];
}
