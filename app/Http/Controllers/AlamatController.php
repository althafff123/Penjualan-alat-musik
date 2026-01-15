<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    public function index()
    {
        $alamats = Alamat::where('user_id', auth()->user()->id)->get();
        return view('userpage.layouts.alamat.index', compact(
            'alamats'
        ));
    }

    public function create()
    {
        $kecamatans = Kecamatan::all();
        return view('userpage.layouts.alamat.create', compact(
            'kecamatans',
        ));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_penerima' => 'required|string',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string|max:5',
            'kecamatan_id' => 'required|string',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Alamat::create($validatedData);


        if (isset($request->redirect)) return redirect($request->redirect);
        return redirect('alamat')->with('successcreate', 'Create Successfull!');
    }

    public function show(Alamat $alamat)
    {
    }

    public function edit($id)
    {
        $alamat = Alamat::find($id);
        $kecamatans = Kecamatan::all();

        return view('userpage.layouts.alamat.edit', compact(
            'alamat',
            'kecamatans'
        ));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alamat  $alamat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alamat = Alamat::find($id);
        $validatedData = $request->validate([
            'nama_penerima' => 'required|string',
            'alamat' => 'required|string',
            'kode_pos' => 'required|string|max:5',
            'kecamatan_id' => 'required|string',
        ]);
        $alamat->update($validatedData);


        return redirect('/alamat')->with('successupdate', 'Update Successfull!');
    }

    public function destroy($id)
    {
        $alamat = Alamat::find($id);
        $alamat->delete();
        return redirect('/alamat')->with('successdelete', 'Delete Successfull!');
    }
}
