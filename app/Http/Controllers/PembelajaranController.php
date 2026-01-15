<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Pelatih;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Pembelajaran;

class PembelajaranController extends Controller
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
        $pembelajaran = pembelajaran::where(function ($q) use ($keyword) {
            $q->where('nama_pembelajaran', 'LIKE', '%' . $keyword . '%');
            $q->where('tarif', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('deskripsi', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('diskon', 'LIKE', '%' . $keyword . '%');
            $q->orWhereHas('pelatih', function ($q) use ($keyword) {
                $q->where('nama_pelatih', 'LIKE', '%' . $keyword . '%');
            });
            $q->orWhereHas('kategori', function ($q) use ($keyword) {
                $q->where('nama_kategori', 'LIKE', '%' . $keyword . '%');
            });
        })->Paginate(5);
        $pembelajaran->withpath('/dashboard/pembelajaran');
        return view('dashboard.pembelajaran.index', compact(
            'pembelajaran',
            'keyword',
            'setting'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $setting = Setting::first();
        $pelatihs = Pelatih::all();
        $kategoris = kategori::all();

        return view('dashboard.pembelajaran.create', compact(
            'pelatihs',
            'setting',
            'kategoris'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->harga
        $validatedData = $request->validate([
            'nama_pembelajaran' => 'required|string',
            'pelatih_id' => 'required|string',
            'kategori_id' => 'required|string',
            'tarif' => 'required|string',
            'deskripsi' => 'required|string',
            'diskon' => 'integer',


        ]);
        $validatedData['tarif'] = str_replace('.', '', $validatedData['tarif']);
        $validatedData['tarif'] = str_replace(',', '.', $validatedData['tarif']);

        Pembelajaran::create($validatedData);

        return redirect('dashboard/pembelajaran')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(pembelajaran $pembelajaran)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::first();
        $pelatihs = Pelatih::all();
        $kategoris = kategori::all();
        $pembelajaran = pembelajaran::find($id);
        return view('dashboard.pembelajaran.edit', compact(
            'pembelajaran',
            'pelatihs',
            'setting',
            'kategoris'

        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tambah = pembelajaran::find($id);
        $validatedData = $request->validate([
            'nama_pembelajaran' => 'required|string',
            'pelatih_id' => 'required|string',
            'kategori_id' => 'required|string',
            'tarif' => 'required|string',
            'deskripsi' => 'required|string',
            'diskon' => 'integer',


        ]);


        $validatedData['tarif'] = str_replace('.', '', $validatedData['tarif']);
        $validatedData['tarif'] = str_replace(',', '.', $validatedData['tarif']);

        if (isset($request->foto)) {
            $validatedData['foto'] = $request->foto->store('pembelajaran', 'public');
        }
        $tambah->update($validatedData);


        return redirect('dashboard/pembelajaran')->with('successupdate', 'Update Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pembelajaran  $pembelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tambah = pembelajaran::find($id);
        $tambah->delete();
        return redirect('dashboard/pembelajaran')->with('successdelete', 'Delete Successfull!');
    }

    public function indexUser()
    {
        return view('userpage.layouts.pembelajaran');
    }
}
