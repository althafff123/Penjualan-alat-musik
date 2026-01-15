<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Barang;
use App\Models\Checkout;
use App\Models\keranjang;
use App\Models\pengiriman;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\Midtrans\CreateSnapTokenService;


class CheckoutController extends Controller
{
    public function index()
    {
        $ada = true;
        $keranjangs = keranjang::with(['barang'])->where('user_id', auth()->user()->id)->get();

        // dd($keranjangs);

        foreach ($keranjangs as $keranjang) {
            $barang = Barang::where('id', $keranjang->barang->id)->first();
            if ($keranjang->kuantitas > $barang->stock) {
                $ada = false;
            }
        }

        if (!$ada) {
            return back()->with('error', 'Kuantitas Melebihi Batas');
        }

        $total = 0;
        foreach ($keranjangs as $item) {
            $total += (($item->barang->harga - ($item->barang->harga * $item->barang->diskon / 100)) * $item->kuantitas);
        }
        $alamats = Alamat::with(['kecamatan'])->where('user_id', auth()->user()->id)->get();
        return view('userpage.layouts.checkout.index', compact('keranjangs', 'total', 'alamats'));
    }

    public function charge(Request $request)
    {
        $data = $request->validate([
            'alamat_id' => 'required',
            'courier' => 'required',
            'layanan' => 'required',
            'ongkir' => 'required',
            'estimasi' => 'required',
        ]);

        $total_harga = 0;
        $keranjangs = keranjang::where('user_id', auth()->user()->id)->get();
        foreach ($keranjangs as $keranjang) {
            $total_harga += ($keranjang->barang->harga - ($keranjang->barang->harga * $keranjang->barang->diskon / 100)) * $keranjang->kuantitas;
        }
        $total_harga += $data['ongkir'];

        $checkout = Checkout::create([
            'no_invoice' => 'INV' . rand(10000, 99999) . date('dmYhms') . auth()->user()->id,
            'alamat_id' => $data['alamat_id'],
            'user_id' => auth()->user()->id,
            'total_harga' => $total_harga
        ]);

        $pengiriman = pengiriman::create([
            'courier' => $data['courier'],
            'ongkir' => $data['ongkir'],
            'estimasi' => $data['estimasi'],
            'checkout_id' => $checkout->id

        ]);

        foreach ($keranjangs as $keranjang) {
            $subtotal = ($keranjang->barang->harga - ($keranjang->barang->harga * $keranjang->barang->diskon / 100)) * $keranjang->kuantitas;
            $pesanan = pesanan::create([
                'barang_id' => $keranjang->barang_id,
                'kuantitas' => $keranjang->kuantitas,
                'subtotal' => $subtotal,
                'checkout_id' => $checkout->id
            ]);
            $barang = Barang::where('id', $keranjang->barang_id)->first();
            $barang->update(['stock' => $barang->stock - $keranjang->kuantitas]);
            $keranjang->delete();
        }

        return redirect('/checkout/' . $checkout->id);
    }

    public function show(Checkout $checkout)
    {
        $snapToken = $checkout->snap_token;
        if (!isset($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenService($checkout);
            $snapToken = $midtrans->getSnapToken();

            $checkout->snap_token = $snapToken;
            $checkout->save();
        }
        return view('userpage.layouts.checkout.show', compact('checkout', 'snapToken'));
    }

    public function batal(Checkout $checkout)
    {
        Checkout::where('id', $checkout->id)->update(['status' => 6]);

        $pesanans = pesanan::where('checkout_id', $checkout->id)->get();
        foreach ($pesanans as $pesanan) {
            $barang = Barang::find($pesanan->barang_id);
            $barang->update(['stock' => $barang->stock + $pesanan->kuantitas]);
        }

        return redirect()->back();
    }

    public function cetak_pdf_detail(Checkout $checkout)
    {
        $pdf = Pdf::loadView('userpage.layouts.checkout.detail_pdf', ['checkout' => $checkout]);
        return $pdf->download('detail_pesanan.pdf');
    }
}
