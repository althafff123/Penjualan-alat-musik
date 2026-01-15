<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['email' => 'andinoferdiansah@gmail.com', 'no_whatsapp' => '081359528944', 'facebook' => 'https://www.facebook.com/andino.ferdiansah', 'instagram' => 'https://www.instagram.com/andinoferdi', 'youtube' => 'https://youtube.com/channel/UCi4AAITeZf7Txpws4eK-uQw', 'twitter' => 'hhttps://twitter.com/andinoferdi_', 'logo_utama' => 'logo_utama/logo.png', 'logo_navbar' => 'logo_navbar/logo.png', 'banner_utama' => 'banner_utama/Bg guitar1-min.jpg', 'logo_footer' => 'logo_footer/logo1.png', 'logo_register' => 'logo_register/minibackgroundregister.png']);
    }
}
