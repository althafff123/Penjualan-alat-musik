<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Kecamatan;


class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $setting = Setting::first();
        $keyword = $request->keyword;
        $kecamatan = Kecamatan::where('nama_kecamatan', 'LIKE', '%' . $keyword . '%')->Paginate(20);
        $kecamatan->withpath('/dashboard/kecamatan');
        $kecamatan->appends($request->all());
        return view('dashboard.kecamatan.index', compact(
            'kecamatan',
            'keyword',
            'setting'
        ));
    }
}
