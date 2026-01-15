<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Keranjang;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OngkirController extends Controller
{
    public function cost(Request $request)
    {
        $alamat = Alamat::find($request->alamat_id);
        $keranjang = Keranjang::where('user_id', auth()->user()->id)->with(['barang'])->get();
        $weight = 0;
        foreach ($keranjang as $item) {
            $weight += $item->barang->berat * $item->kuantitas;
        }
        $response = Http::asForm()->withHeaders([
            'key' => getenv('RAJAONGKIR_API_KEY'),
        ])->post('https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost', [
            'origin' => '444',
            'destination' => '444',
            'weight' => $weight,
            'courier' => $request->courier,
        ]);

        return response()->json($response->json()['data'], $response->status());
    }
}
