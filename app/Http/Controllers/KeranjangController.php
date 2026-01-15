<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = keranjang::with(['barang'])->where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($keranjangs as $item) {
            $total += (($item->barang->harga - ($item->barang->harga * $item->barang->diskon / 100)) * $item->kuantitas);
        }
        return view('userpage.layouts.keranjang', compact('keranjangs', 'total'));
    }

    public function store($id)
    {
        $cek = keranjang::where('user_id', auth()->user()->id)->where('barang_id', $id)->first();
        // if ($cek) return redirect('/keranjang')->with('alert', 'Berhasil Ditambahkan Ke keranjang');

        if ($cek) {
            $barang = Barang::find($id);
            $kuantitas = $cek->kuantitas + 1;
            if ($kuantitas > $barang->stock) {
                $kuantitas = $barang->stock;
            }
            $cek->update([
                'kuantitas' => $kuantitas
            ]);
        } else {
            keranjang::create([
                'barang_id' => $id,
                'user_id' => auth()->user()->id,
                'kuantitas' => 1
            ]);
        }



        return redirect('/keranjang')->with('alert', 'Berhasil Ditambahkan Ke keranjang');
    }

    public function update(Request $request, $id)
    {
        keranjang::find($id)->update(['kuantitas' => $request->kuantitas]);
        return redirect('/keranjang');
    }

    public function massUpdate(Request $request)
    {

        foreach ($request->keranjang_id as $i => $keranjang) {
            Keranjang::find($keranjang)->update(["kuantitas" => $request->kuantitas[$i]]);
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        $keranjang = keranjang::find($id);
        $keranjang->delete();
        return response()->json(['status' => true]);
    }
}
