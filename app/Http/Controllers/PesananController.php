<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Checkout;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
    public function index(Request $request, $status)
    {
        $keyword = $request->keyword;
        $checkouts = Checkout::with(['pesanans.barang', 'user', 'pengiriman'])->where(function ($q) use ($keyword) {
            $q->whereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%');
            });
        })->where('status', $status)->paginate();
        return view('dashboard.pesanan.index', compact('checkouts', 'keyword', 'status'));
    }

    public function indexuser(Checkout $checkout)
    {
        $checkouts = checkout::where('user_id', auth()->user()->id)->get();
        return view('userpage.layouts.pesanan.index', compact('checkouts'));
    }

    public function updateStatus(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);

        Checkout::where('id', $id)->update($data);

        return redirect('/dashboard/pesanan/' . $data['status']);
    }

    public function updateStatusUser(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);

        Checkout::where('id', $id)->update($data);

        return redirect('/pesanan');
    }

    public function detail(Checkout $checkout)
    {
        return view('dashboard.pesanan.detail', compact('checkout'));
    }

    public function cetak_pdf_detail(Checkout $checkout)
    {
        $pdf = Pdf::loadView('dashboard.pesanan.detail_pdf', ['checkout' => $checkout]);
        return $pdf->download('detail_pesanan.pdf');
    }

    public function cetak_pdf($status)
    {
        $checkouts = Checkout::where('status', $status)->get();
        $pdf = Pdf::loadView('dashboard.pesanan.pdf', ['checkouts' => $checkouts]);
        return $pdf->download('pesanan.pdf');
    }

    public function cetak_pdf_detail_user(Checkout $checkout)
    {
        $pdf = Pdf::loadView('dashboard.pesanan.detail_pdf', ['checkout' => $checkout]);
        return $pdf->download('detail_pesanan.pdf');
    }
}
