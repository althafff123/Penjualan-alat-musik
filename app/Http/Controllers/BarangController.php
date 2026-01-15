<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Barang;
use App\Models\kategori;

class BarangController extends Controller
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
        $barang = barang::where(function ($q) use ($keyword) {
            $q->where('nama_barang', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('foto', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('stock', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('harga', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('diskon', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('berat', 'LIKE', '%' . $keyword . '%');
            $q->orWhereHas('kategori', function ($q) use ($keyword) {
                $q->where('nama_kategori', 'LIKE', '%' . $keyword . '%');
            });
        })->Paginate(5);
        $barang->withpath('/dashboard/barang');
        return view('dashboard.barang.index', compact(
            'barang',
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
        $tambah = barang::all();
        $kategoris = kategori::get();
        return view('dashboard.barang.create', compact(
            'tambah',
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
            'nama_barang' => 'required|string',
            'foto' => 'required|image',
            'harga' => 'required|string',
            'berat' => 'required',
            'deskripsi' => 'required|string',
            'stock' => 'required|integer|min:0',
            'diskon' => 'integer',
            'kategori_id' => 'required|string',

        ]);

        $validatedData['harga'] = str_replace('.', '', $validatedData['harga']);
        $validatedData['harga'] = str_replace(',', '.', $validatedData['harga']);

        $validatedData['foto'] = $request->foto->store('barang', 'public');

        barang::create($validatedData);

        return redirect('dashboard/barang')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::first();
        $barang = barang::find($id);
        $kategoris = kategori::get();
        return view('dashboard.barang.edit', compact(
            'barang',
            'kategoris',
            'setting',

        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tambah = barang::find($id);
        $validatedData = $request->validate([
            'nama_barang' => 'required|string',
            'foto' => 'image',
            'harga' => 'required|string',
            'berat' => 'required',
            'stock' => 'required|integer|min:0',
            'deskripsi' => 'required|string',
            'diskon' => 'integer',
            'kategori_id' => 'required|string',
        ]);



        if (isset($request->foto)) {
            $validatedData['foto'] = $request->foto->store('barang', 'public');
        }
        $validatedData['harga'] = str_replace('.', '', $validatedData['harga']);
        $validatedData['harga'] = str_replace(',', '.', $validatedData['harga']);
        $tambah->update($validatedData);


        return redirect('dashboard/barang')->with('successupdate', 'Update Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tambah = barang::find($id);
        $tambah->delete();
        return redirect('dashboard/barang')->with('successdelete', 'Delete Successfull!');
    }
}
