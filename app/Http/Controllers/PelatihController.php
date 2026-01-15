<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Pelatih;

class PelatihController extends Controller
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
        $pelatih = pelatih::where(function ($q) use ($keyword) {
            $q->where('nama_pelatih', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('foto', 'LIKE', '%' . $keyword . '%');
        })->Paginate(5);
        $pelatih->withpath('/dashboard/pelatih');
        return view('dashboard.pelatih.index', compact(
            'pelatih',
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
        $tambah = pelatih::all();
        return view('dashboard.pelatih.create', compact(
            'tambah',
            'setting',
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
            'nama_pelatih' => 'required|string',
            'foto' => 'required|image',
            'deskripsi' => 'required|string',

        ]);
        $validatedData['foto'] = $request->foto->store('pelatih', 'public');

        pelatih::create($validatedData);

        return redirect('dashboard/pelatih')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pelatih  $pelatih
     * @return \Illuminate\Http\Response
     */
    public function show(pelatih $pelatih)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pelatih  $pelatih
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::first();
        $pelatih = pelatih::find($id);
        return view('dashboard.pelatih.edit', compact(
            'pelatih',
            'setting',

        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pelatih  $pelatih
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tambah = pelatih::find($id);
        $validatedData = $request->validate([
            'nama_pelatih' => 'required|string',
            'foto' => 'image',
            'deskripsi' => 'required|string',
        ]);



        if (isset($request->foto)) {
            $validatedData['foto'] = $request->foto->store('pelatih', 'public');
        }
        $tambah->update($validatedData);


        return redirect('dashboard/pelatih')->with('successupdate', 'Update Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pelatih  $pelatih
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tambah = pelatih::find($id);
        $tambah->delete();
        return redirect('dashboard/pelatih')->with('successdelete', 'Delete Successfull!');
    }
}
