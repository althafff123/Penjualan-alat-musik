<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Kategori;
use App\Models\Pembelajaran;

class KategoriController extends Controller
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
        $kategori = Kategori::where('nama_kategori', 'LIKE', '%' . $keyword . '%')->Paginate(3);
        $kategori->withpath('/dashboard/kategori');
        $kategori->appends($request->all());
        return view('dashboard.kategori.index', compact(
            'kategori',
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
        $tambah = Kategori::all();
        return view('dashboard.kategori.create', compact(
            'tambah',
            'setting'
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
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string',
        ]);
        Kategori::create($validatedData);


        return redirect('dashboard/kategori')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::first();
        $kategori = Kategori::find($id);
        return view('dashboard.kategori.edit', compact(
            'kategori',
            'setting'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tambah = Kategori::find($id);
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string',
        ]);
        $tambah->update($validatedData);


        return redirect('dashboard/kategori')->with('successupdate', 'Update Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tambah = Kategori::find($id);
        $barang = Barang::where('kategori_id', $id)->get();
        if (!$barang->isEmpty()) {
            Barang::where('kategori_id', $id)->delete();
        }

        $pembelajaran = Pembelajaran::where('kategori_id', $id)->get();
        if (!$pembelajaran->isEmpty()) {
            Pembelajaran::where('kategori_id', $id)->delete();
        }
        $tambah->delete();
        return redirect('dashboard/kategori')->with('successdelete', 'Delete Successfull!');
    }
}
