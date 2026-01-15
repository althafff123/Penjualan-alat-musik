<?php

namespace App\Http\Controllers;

use App\Models\CheckoutPembelajaran;
use App\Models\Pelatih;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class PesananPembelajaranController extends Controller
{
    public function index(Request $request, $status)
    {
        $keyword = $request->keyword;
        $checkout_pembelajarans = CheckoutPembelajaran::with(['pembelajaran', 'user'])->where(function ($q) use ($keyword) {
            $q->whereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%');
            });
        })->where('status', $status)->paginate();

        $checkout_pembelajarans->map(function ($a) {
            $a->is_mulai = Carbon::parse($a->tanggal . ' ' . $a->jam_mulai)->isPast();
            $a->is_selesai = Carbon::parse($a->tanggal . ' ' . $a->jam_selesai)->isPast();
        });
        return view('dashboard.pesanan_pembelajaran.index', compact('checkout_pembelajarans', 'keyword', 'status'));
    }

    public function indexuser(CheckoutPembelajaran $checkout_pembelajaran)
    {
        $checkout_pembelajarans = CheckoutPembelajaran::where('user_id', auth()->user()->id)->get();
        return view('userpage.layouts.pesanan_pembelajaran.index', compact('checkout_pembelajarans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);

        CheckoutPembelajaran::where('id', $id)->update($data);

        if ($data['status'] == 5 || $data['status'] == 6) {
            Pelatih::find(CheckoutPembelajaran::find($id)->pembelajaran->pelatih_id)->update(['status' => '1']);
        }

        return redirect('/dashboard/pesanan_pembelajaran/' . $data['status']);
    }

    public function updateStatusUser(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);

        CheckoutPembelajaran::where('id', $id)->update($data);
        if ($data['status'] == 5 || $data['status'] == 6) {
            Pelatih::find(CheckoutPembelajaran::find($id)->pembelajaran->pelatih_id)->update(['status' => '1']);
        }

        return redirect('/pesanan_pembelajaran');
    }

    public function batal(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required'
        ]);

        CheckoutPembelajaran::where('id', $id)->update(['status' => 6]);

        if ($data['status'] == 5 || $data['status'] == 6) {
            Pelatih::find(CheckoutPembelajaran::find($id)->pembelajaran->pelatih_id)->update(['status' => '1']);
        }


        return redirect()->back();
    }

    public function detail(CheckoutPembelajaran $checkout_pembelajaran)
    {

        return view('dashboard.pesanan_pembelajaran.detail', compact('checkout_pembelajaran'));
    }

    public function cetak_pdf_detail(CheckoutPembelajaran $checkout_pembelajaran)
    {
        $checkout_pembelajaran->load('pembelajaran');
        $pdf = Pdf::loadView('dashboard.pesanan_pembelajaran.detail_pdf', ['checkout_pembelajaran' => $checkout_pembelajaran]);
        return $pdf->download('detail_pembelajaran.pdf');
    }

    public function cetak_pdf($status)
    {
        $checkout_pembelajarans = CheckoutPembelajaran::where('status', $status)->get();
        $pdf = Pdf::loadView('dashboard.pesanan_pembelajaran.pdf', ['checkout_pembelajarans' => $checkout_pembelajarans])->setPaper('a4', 'landscape');
        return $pdf->download('pembelajaran.pdf');
    }
}
