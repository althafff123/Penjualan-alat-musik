<?php

namespace Database\Seeders;

use App\Models\kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        kategori::create(['nama_kategori' => 'Melodis']);
        kategori::create(['nama_kategori' => 'Ritmis']);
        kategori::create(['nama_kategori' => 'Harmonis']);
    }
}
