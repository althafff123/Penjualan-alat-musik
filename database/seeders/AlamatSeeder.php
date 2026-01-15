<?php

namespace Database\Seeders;

use App\Models\Alamat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alamat::create(['nama_penerima' => 'Bahro', 'alamat' => 'Jl. Bibis Tama IA No.22', 'kode_pos' => '60185', 'kecamatan_id' => '31', 'user_id' => '2']);
    }
}
