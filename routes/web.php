<?php

use App\Models\barang;
use App\Models\Rating;
use App\Models\Setting;
use App\Models\kategori;
use App\Models\Komentar;
use App\Models\Keranjang;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use App\Models\Ratingpembelajaran;
use App\Models\CheckoutPembelajaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PembelajaranController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PaymentCallbackController;
use App\Http\Controllers\RatingPembelajaranController;
use App\Http\Controllers\PesananPembelajaranController;
use App\Http\Controllers\CheckoutPembelajaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard.layouts.index');
})->middleware(['auth', 'admin']);
Route::get('/', function () {
    $kategoris = kategori::get();
    $barangs = barang::with(['kategori'])->get();
    $barangs_diskon = barang::where('diskon', '>', 0)->get();
    $komentars = komentar::all();
    $keranjangs = Keranjang::get();
    return view('userpage.layouts.home', compact('kategoris', 'barangs', 'barangs_diskon', 'komentars', 'keranjangs'));
});
Route::get('/produk', function (Request $request) {
    $kategoris = kategori::get();
    $barangs = barang::with(['kategori'])->where(function ($q) use ($request) {
        $q->where('nama_barang', 'LIKE', '%' . $request->search . '%');
        $q->orWhere('deskripsi', 'LIKE', '%' . $request->search . '%');
    })->get();
    return view('userpage.layouts.produk', compact('kategoris', 'barangs'));
});

Route::get('/pembelajaran', function (Request $request) {
    $kategoris = kategori::get();
    $pembelajarans = pembelajaran::where(function ($q) use ($request) {
        $q->where('nama_pembelajaran', 'LIKE', '%' . $request->search . '%');
        $q->orWhere('deskripsi', 'LIKE', '%' . $request->search . '%');
    })->get();
    $pembelajarans_diskon = pembelajaran::where('diskon', '>', 0)->get();
    return view('userpage.layouts.pembelajaran', compact('kategoris', 'pembelajarans_diskon', 'pembelajarans'));
});

Route::get('/about', function () {
    return view('userpage.layouts.about');
});

Route::get('/barang/{id}', function ($id) {
    $barang = barang::where('id', $id)->first();
    $ratings = Rating::where('barang_id', $id)->get();
    $sum_rating = Rating::where('barang_id', $id)->sum('rating');
    $count_rating = Rating::where('barang_id', $id)->count();
    $total_rating = 0;
    if ($count_rating > 0) {
        $total_rating = round($sum_rating / $count_rating, 2);
    }

    return view('userpage.layouts.detail_barang', ['barang' => $barang, 'ratings' => $ratings, 'total_rating' => $total_rating]);
});


Route::get('/pembelajaran/{id}', function ($id) {
    $pembelajaran = pembelajaran::where('id', $id)->first();
    $rating_pembelajarans = RatingPembelajaran::where('pembelajaran_id', $id)->get();
    $sum_rating = RatingPembelajaran::where('pembelajaran_id', $id)->sum('rating');
    $count_rating = RatingPembelajaran::where('pembelajaran_id', $id)->count();
    $total_rating_pembelajaran = 0;
    if ($count_rating > 0) {
        $total_rating_pembelajaran = round($sum_rating / $count_rating, 2);
    }
    return view('userpage.layouts.detail_pembelajaran', ['pembelajaran' => $pembelajaran, 'rating_pembelajarans' => $rating_pembelajarans, 'total_rating_pembelajaran' => $total_rating_pembelajaran]);
});



Route::post('/keranjang/update', [KeranjangController::class, 'massUpdate'])->middleware(['auth']);
Route::get('/keranjang', [KeranjangController::class, 'index'])->middleware(['auth']);
Route::post('/keranjang/{id}', [KeranjangController::class, 'store'])->middleware(['auth']);
Route::post('/keranjang/{id}/update', [KeranjangController::class, 'update'])->middleware(['auth']);
Route::get('/keranjang/{id}/delete', [KeranjangController::class, 'destroy'])->middleware(['auth']);
Route::get('/checkout', [CheckoutController::class, 'index'])->middleware(['auth']);
Route::post('/checkout', [CheckoutController::class, 'charge'])->middleware(['auth']);
Route::get('/checkout/{checkout}', [CheckoutController::class, 'show'])->middleware(['auth']);
Route::get('/checkout/{checkout}/{id}', [CheckoutController::class, 'cetak_pdf_detail'])->middleware('auth');
Route::post('/checkout/{checkout}/batal', [CheckoutController::class, 'batal'])->middleware(['auth']);
Route::post('/checkout/cek_ongkir', [OngkirController::class, 'cost'])->middleware('auth');
Route::resource('/alamat', AlamatController::class)->middleware(['auth']);
Route::get('/pesanan', [PesananController::class, 'indexuser'])->middleware(['auth']);
Route::get('/pesanan_pembelajaran', [PesananPembelajaranController::class, 'indexuser'])->middleware(['auth']);
Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth']);
Route::get('/profile/setting', [ProfileController::class, 'setting'])->middleware(['auth']);
Route::post('/profile/setting', [ProfileController::class, 'settingUpdate'])->middleware(['auth']);
Route::post('/userpage/layouts/komentar/komentar-web', [KomentarController::class, 'KomentarWeb'])->middleware(['auth']);
Route::delete('/userpage/layouts/komentar/komentar-web/{id}', [KomentarController::class, 'destroyWeb'])->middleware(['auth']);
Route::post('/profile/setting/hapus-avatar', [ProfileController::class, 'hapusAvatar'])->middleware(['auth']);
Route::post('/userpage/layouts/pesanan/update-status-user/{id}', [PesananController::class, 'updateStatusUser'])->middleware('auth');
Route::post('/userpage/layouts/pesanan_pembelajaran/update-status-user/{id}', [PesananPembelajaranController::class, 'updateStatusUser'])->middleware('auth');
Route::get('/barang/rating/{id}', [RatingController::class, 'indexUser'])->middleware(['auth']);
Route::post('/barang/rating/{id}', [RatingController::class, 'post'])->middleware(['auth']);
Route::get('/pembelajaran/rating/{id}', [RatingPembelajaranController::class, 'indexUser'])->middleware(['auth']);
Route::post('/pembelajaran/rating/{id}', [RatingPembelajaranController::class, 'post'])->middleware(['auth']);
Route::get('/checkout_pembelajaran/{id}', [CheckoutPembelajaranController::class, 'index'])->middleware(['auth']);
Route::post('/checkout-pembelajaran/{id}', [CheckoutPembelajaranController::class, 'charge'])->middleware(['auth']);
Route::get('/checkout-pembelajaran/{id}', [CheckoutPembelajaranController::class, 'show'])->middleware(['auth']);
Route::post('/checkout_pembelajaran/{id}/batal', [CheckoutPembelajaranController::class, 'batal'])->middleware(['auth']);
Route::get('/checkout_pembelajaran/{checkout_pembelajaran}/{id}', [CheckoutPembelajaranController::class, 'cetak_pdf_detail'])->middleware('auth');
Route::post('payments/midtrans-notification', [PaymentCallbackController::class, 'receive']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');
Route::resource('/dashboard/kategori', KategoriController::class)->middleware('admin');
Route::resource('/dashboard/kecamatan', KecamatanController::class)->middleware('admin');
Route::resource('/dashboard/barang', BarangController::class)->middleware('admin');
Route::resource('/dashboard/pelatih', PelatihController::class)->middleware('admin');
Route::resource('/dashboard/pembelajaran', PembelajaranController::class)->middleware('admin');
Route::resource('/dashboard/komentar', KomentarController::class)->middleware('admin');
Route::get('/dashboard/setting', [SettingController::class, 'index'])->middleware('admin');
Route::post('/dashboard/setting/perusahaan', [SettingController::class, 'perusahaan'])->middleware('admin');
Route::post('/dashboard/setting/sosial_media', [SettingController::class, 'sosial_media'])->middleware('admin');
Route::post('/dashboard/setting/background', [SettingController::class, 'background'])->middleware('admin');
Route::get('/dashboard/profile/setting', [ProfileController::class, 'settingAdmin'])->middleware(['admin']);
Route::post('/dashboard/profile/setting', [ProfileController::class, 'settingUpdateAdmin'])->middleware(['admin']);
Route::post('/dashboard/profile/setting/hapus-avatar', [ProfileController::class, 'hapusAvatarAdmin'])->middleware(['admin']);
Route::get('/dashboard/pesanan/{status}', [PesananController::class, 'index'])->middleware('admin');
Route::post('/dashboard/pesanan/update-status/{id}', [PesananController::class, 'updateStatus'])->middleware('admin');
Route::get('/dashboard/pesanan/detail/{checkout}', [PesananController::class, 'detail'])->middleware('admin');
Route::get('/dashboard/pesanan/detail/{checkout}/{id}', [PesananController::class, 'cetak_pdf_detail'])->middleware('admin');
Route::get('/dashboard/cetakSeluruh/{status}/cetak', [PesananController::class, 'cetak_pdf'])->middleware('admin');
Route::resource('/dashboard/rating', RatingController::class)->middleware('admin');
Route::resource('/dashboard/rating_pembelajaran', RatingPembelajaranController::class)->middleware('admin');

Route::get('/dashboard/pesanan_pembelajaran/{status}', [PesananPembelajaranController::class, 'index'])->middleware('admin');
Route::post('/dashboard/pesanan_pembelajaran/update-status/{id}', [PesananPembelajaranController::class, 'updateStatus'])->middleware('admin');
Route::get('/dashboard/pesanan_pembelajaran/detail/{checkout_pembelajaran}', [PesananPembelajaranController::class, 'detail'])->middleware('admin');
Route::get('/dashboard/cetakSeluruh/{status}/cetak', [PesananController::class, 'cetak_pdf'])->middleware('admin');
Route::get('/dashboard/pesanan_pembelajaran/detail/{checkout_pembelajaran}/{id}', [PesananPembelajaranController::class, 'cetak_pdf_detail'])->middleware('admin');
Route::get('/dashboard/cetakSeluruh-pembelajaran/{status}/cetak', [PesananPembelajaranController::class, 'cetak_pdf'])->middleware('admin');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');


Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->middleware('guest');


// Forgot Password dengan OTP Code
Route::middleware('guest')->group(function () {
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetCode'])->name('password.email');
    
    Route::get('/verify-code', [ForgotPasswordController::class, 'showVerifyCodeForm'])->name('password.verify.code');
    Route::post('/verify-code', [ForgotPasswordController::class, 'verifyCode'])->name('password.verify');
    
    Route::get('/reset-password', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset.form');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// 