<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\CheckoutPembelajaran;
use App\Models\Pelatih;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Services\Midtrans\CreateSnapTokenPembelajaranService;


class CheckoutPembelajaranController extends Controller
{
    public function index(Request $request, $id)
    {
        $pembelajaran = Pembelajaran::find($id);
        $alamats = Alamat::with(['kecamatan'])->where('user_id', auth()->user()->id)->get();
        return view('userpage.layouts.checkout_pembelajaran.index', compact('pembelajaran', 'alamats', 'id'));
    }

    public function charge(Request $request, $id)
    {
        $data = $request->validate([
            'alamat_id' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',

        ]);

        $pembelajaran = Pembelajaran::find($id);

        $lama = (int)explode(':', $data['jam_selesai'])[0] - (int)explode(':', $data['jam_mulai'])[0];
        $data['total_harga'] = $pembelajaran->tarif - ($pembelajaran->tarif * $pembelajaran->diskon / 100);
        $data['total_harga'] = $data['total_harga'] * $lama;
        $data['user_id'] = auth()->user()->id;
        $data['pembelajaran_id'] = $id;

        $checkout_pembelajaran = CheckoutPembelajaran::create($data);
        $pembelajaran = Pembelajaran::find($id);
        Pelatih::where('id', $pembelajaran->pelatih_id)->update(['status' => '2']);
        return redirect('/checkout-pembelajaran/' . $checkout_pembelajaran->id);
    }

    public function show($id)
    {
        $checkout_pembelajaran = CheckoutPembelajaran::with(['user', 'pembelajaran'])->where('id', $id)->first();
        $snapToken = $checkout_pembelajaran->snap_token;
        if (!isset($snapToken)) {
            // If snap token is still NULL, generate snap token and save it to database

            $midtrans = new CreateSnapTokenPembelajaranService($checkout_pembelajaran);
            $snapToken = $midtrans->getSnapToken();

            $checkout_pembelajaran->snap_token = $snapToken;
            $checkout_pembelajaran->save();
        }
        return view('userpage.layouts.checkout_pembelajaran.show', compact('checkout_pembelajaran', 'snapToken'));
    }

    public function batal($id)
    {
        CheckoutPembelajaran::where('id', $id)->update(['status' => 6]);

        Pelatih::find(CheckoutPembelajaran::find($id)->pembelajaran->pelatih_id)->update(['status' => '1']);

        return redirect()->back();
    }

    public function cetak_pdf_detail(CheckoutPembelajaran $checkout_pembelajaran)
    {
        $checkout_pembelajaran->load('pembelajaran');
        $pdf = Pdf::loadView('userpage.layouts.checkout_pembelajaran.detail_pdf', ['checkout_pembelajaran' => $checkout_pembelajaran]);
        return $pdf->download('detail_pembelajaran.pdf');
    }
}
