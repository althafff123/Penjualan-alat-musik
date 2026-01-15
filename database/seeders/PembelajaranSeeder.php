<?php

namespace Database\Seeders;

use App\Models\Pembelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pembelajaranseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pembelajaran::create(['nama_pembelajaran' => 'Pembelajaran Melodis', 'pelatih_id' => '1', 'kategori_id' => '1', 'tarif' => '61500', 'diskon' => '20', 'deskripsi' => '<p>Pembelajaran melodis adalah pembelajaran yang membelajarkan kategori alat musik Melodis contohnya yaitu :&nbsp;</p><p>-Gitar</p><p>-Recorder</p><p>-Biola</p><p>-Saksofon</p>']);
        Pembelajaran::create(['nama_pembelajaran' => 'Pembelajaran Ritmis', 'pelatih_id' => '2', 'kategori_id' => '2', 'tarif' => '45900', 'diskon' => '0', 'deskripsi' => '<p>Pembelajaran Ritmis adalah pembelajaran yang membelajarkan kategori alat musik Ritmis contohnya yaitu :</p><p>-Drum</p><p>-Triangle</p><p>-Tamborin</p><p>-Cajon</p>']);
        Pembelajaran::create(['nama_pembelajaran' => 'Pembelajaran Harmonis', 'pelatih_id' => '3', 'kategori_id' => '3', 'tarif' => '42000', 'diskon' => '0', 'deskripsi' => '<p>Pembelajaran Harmonis adalah pembelajaran yang membelajarkan kategori alat musik Harmonis contohnya yaitu :&nbsp;</p><p>-Piano</p><p>-Pianika</p><p>-Keyboard</p>']);
    }
}
