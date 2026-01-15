<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutPembelajaran;
use App\Models\Kategori;
use App\Models\Pelatih;
use App\Models\Barang;
use App\Models\komentar;
use App\Models\Pembelajaran;
use App\Models\Rating;
use App\Models\Ratingpembelajaran;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $pesanans = Checkout::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $pesanan_pembelajarans = CheckoutPembelajaran::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count', 'month_name');

        $labelpesanan = $pesanans->keys();
        $datapesanan = $pesanans->values();
        $labelpesanan_pembelajaran = $pesanan_pembelajarans->keys();
        $datapesanan_pembelajaran = $pesanan_pembelajarans->values();


        $setting = Setting::first();
        $keyword = $request->keyword;
        $users = User::where('is_admin', '0')->where('name', 'LIKE', '%' . $keyword . '%')->paginate(10);

        $kategori = Kategori::count();
        $barang = Barang::count();
        $pelatih = Pelatih::count();
        $pembelajaran = Pembelajaran::count();
        $komentar = komentar::count();
        $barangPembayaran = Checkout::where('status', '1')->count();
        $barangKonfirmasi = Checkout::where('status', '2')->count();
        $barangDiproses = Checkout::where('status', '3')->count();
        $barangDikirim = Checkout::where('status', '4')->count();
        $barangSelesai = Checkout::where('status', '5')->count();
        $barangGagal = Checkout::where('status', '6')->count();
        $totalpesananbarang = Checkout::sum('total_harga');

        $pembelajaranPembayaran = CheckoutPembelajaran::where('status', '1')->count();
        $pembelajaranKonfirmasi = CheckoutPembelajaran::where('status', '2')->count();
        $pembelajaranPerjalanan = CheckoutPembelajaran::where('status', '3')->count();
        $pembelajaranPembelajaran = CheckoutPembelajaran::where('status', '4')->count();
        $pembelajaranSelesai = CheckoutPembelajaran::where('status', '5')->count();
        $pembelajaranGagal = CheckoutPembelajaran::where('status', '6')->count();
        $totalpesananpembelajaran = CheckoutPembelajaran::sum('total_harga');

        $rating = Rating::count();
        $ratingPembelajaran = Ratingpembelajaran::count();
        $totalRating = $rating + $ratingPembelajaran;


        return view('dashboard.index', compact(
            'setting',
            'users',
            'kategori',
            'barang',
            'pelatih',
            'pesanans',
            'pesanan_pembelajarans',
            'labelpesanan',
            'datapesanan',
            'labelpesanan_pembelajaran',
            'datapesanan_pembelajaran',
            'pembelajaran',
            'barangPembayaran',
            'barangKonfirmasi',
            'barangDiproses',
            'barangDikirim',
            'barangSelesai',
            'barangGagal',
            'totalpesananbarang',
            'pembelajaranPembayaran',
            'pembelajaranKonfirmasi',
            'pembelajaranPerjalanan',
            'pembelajaranPembelajaran',
            'pembelajaranSelesai',
            'pembelajaranGagal',
            'totalpesananpembelajaran',

        ));
    }
}
