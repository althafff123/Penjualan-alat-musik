<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Barangseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create(['nama_barang' => 'GITAR IBANEZ MODEL JEM FLOWER', 'foto' => 'barang/Gitar Metallica1.png', 'harga' => '999000', 'berat' => '80', 'stock' => '118', 'kategori_id' => '1', 'diskon' => '0', 'deskripsi' => '<p>Di jual Gitar Elektrik Harga Terjangkau, Gitar Ibanez JEM Flower, gitar yang dipakai oleh kirk hammet yaitu lead guitaris Metallica</p><p>Spek :</p><p>Body mahogani</p><p>neck maple</p><p>Fret baja</p><p>dryer stainless coating</p><p>Pick Up GnB korea</p><p>part standar korea</p><p>P x L x T = 101 x 32 x 4<br>&nbsp;</p><p>pembayaran Midtrans, dikirim ke seluruh Surabaya</p>']);
        Barang::create(['nama_barang' => 'DRUM MAPEX TORNADO', 'foto' => 'barang/Drum.png', 'harga' => '6100000', 'berat' => '650', 'stock' => '2', 'kategori_id' => '2', 'diskon' => '17', 'deskripsi' => '<p>TORNADO By MAPEX Drum Set</p><p>MAPEX AUTHORIZED DEALER</p><p>DEALER RESMI DISTRIBUTOR PT. CITRA INTIRAMA&nbsp;</p><p>STOK WARNA :</p><p>- 1BH Black ( Hitam )&nbsp;</p><p>1 Set Drum Sudah termasuk :&nbsp;</p><p>- Cymbal HI-HAT 14", CRASH 16" dan RIDE 20"&nbsp;</p><p>- Stand Cymbal ( Hihat, Crash dan Ride )</p><p>- Bangku drum&nbsp;</p><p>- Pedal bassdrum&nbsp;</p><p>- Stik Drum&nbsp;</p><p>Spesifikasi Mapex Tornado With Cymbal&nbsp;</p><p>Kit Tornado diproduksi secara eksklusif di fasilitas manufaktur yang dimiliki sepenuhnya oleh Mapex, yang juga membangun rentang drum kelas atas yang lengkap. pabrik baru-baru ini dianugerahi penghargaan standar bersertifikat ISO9001, tolok ukur dunia untuk keunggulan manufaktur. Cangkang drum Tornado terbuat dari basswood asli dan kit ini dilengkapi dengan perangkat keras penguat ganda. Semua kit Tornado termasuk drum snare kayu yang serasi dengan warna.</p>']);
        Barang::create(['nama_barang' => 'Yamaha DGX 670 Black Digital Piano', 'foto' => 'barang/Piano1.png', 'harga' => '10495000', 'berat' => '210', 'stock' => '1', 'kategori_id' => '3', 'diskon' => '0', 'deskripsi' => '<p>New DGX-670!&nbsp;</p><p>Piano Digital Portabel untuk Entertainment Terbaik dan Terjangkau untuk aktivitas beragam di rumah anda! Sampling suara piano: Yamaha CFX - Grand Piano Yamaha yang paling premium. Fitur Piano room untuk kemudahan pemilihan suara piano lainnya serta settingan gema akustik ruangan virtual. Teknologi VRM (Virtual Resonance Modelling) memberi sensasi gema resonansi piano akustik. Dengan 630 voices &amp; 263 styles yang sangat realistis, serasa bermain dengan iringan band besar. Tampilan design panel terbaru, untuk kemudahan pengoperasian.&nbsp;</p><p>Nikmati keseruan lebih, koneksikan microphone, bernyanyi dengan lirik pada layar berwarna serta efek-efek suara, kemudian rekam dan simpan di USB (format wav). Koneksi bluetooth menjadikan DGX-670 sebagai speaker smartphone anda, bersama youtube video! tanpa MIDI song! Speaker lebih kuat, dengan sistem dua arah dan speaker bulat 12cm. Fitur Lesson untuk berlatih notasi pada layar, serta dapat berlatih lagu favorit di gadget melalui aplikasi gratis Chord Tracker (iOS/Android).</p>']);
    }
}
