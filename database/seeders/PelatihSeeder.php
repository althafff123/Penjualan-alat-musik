<?php

namespace Database\Seeders;

use App\Models\Pelatih;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Pelatihseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pelatih::create(['nama_pelatih' => 'James Hetfield', 'foto' => 'pelatih/James Hetfield.png', 'deskripsi' => 'James Alan Hetfield (Lahir 3 Agustus 1963)  adalah penulis lagu, pendiri, penyanyi dan pemain gitar ritme kelompok heavy metal Metallica. James bersama tiga kawannya yang tergabung dalam Metallica merupakan salah satu dari The Big Four, yaitu Metallica, Anthrax, Slayer, dan Megadeth melalui keunikan dan gaya masing masing keempat band itulah genre thrash metal pernah meraih puncak kejayaannya. James Hetfield terkenal karena riff gitarnya yang tidak terlalu njelimet namun sangat pas dan cocok ketika bersandingan dengan instrumen lain dan juga penampilannya ketika di atas panggung yang garang dan kerap mengundang decak kagum setiap penonton yang melihatnya']);
        Pelatih::create(['nama_pelatih' => 'Lars Ulrich', 'foto' => 'pelatih/Lars Ulrich.png', 'deskripsi' => 'Lars Ulrich (lahir 26 Desember 1963) merupakan salah satu pelopor terbentuknya superband Metallica dan genre thrash metal. Lars Ulrich adalah drummer kelompok Metallica. Ayahnya adalah pemain tenis profesional dan musikus jazz Torben Ulrich yang bermain musik jazz bersama Stan Getz dan Miles Davis. Lars Ulrich mengikuti jejak ayahnya di kedua bidang ini, bermain tenis sejak kecil dan belajar main musik']);
        Pelatih::create(['nama_pelatih' => 'Freddie Mercury', 'foto' => 'pelatih/Freddie Mercury.png', 'deskripsi' => 'Frederick "Freddie" Mercury (lahir Farrokh Bulsara; 5 September 1946 – 24 November 1991) adalah seorang penyanyi-penulis lagu dan produser rekaman dan vokalis utama dari band rock Queen berkebangsaan Inggris. Dia dianggap sebagai salah satu dari penyanyi terbaik dalam sejarah musik populer, dan dikenal atas kepribadian flamboyan di panggung dan jangkauan vokal empat-oktafnya']);
    }
}
