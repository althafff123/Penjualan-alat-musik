<?php

namespace App\Http\Controllers;

use App\Models\Komentar;


use Illuminate\Http\Request;

class KomentarController extends Controller

{

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $komentar = Komentar::where(function ($q) use ($keyword) {
            $q->where('komentar', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('balasan_admin', 'LIKE', '%' . $keyword . '%');
            $q->orWhereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%');
            });
        })->Paginate(3);
        $komentar->withpath('/dashboard/komentar');
        $komentar->appends($request->all());
        return view('dashboard.komentar.index', compact(
            'komentar',
            'keyword',
        ));
    }

    public function edit($id)
    {
        $komentar = Komentar::find($id);
        return view('dashboard.komentar.balas', compact(
            'komentar',
        ));
    }

    public function update(Request $request, $id)
    {
        $komentar = Komentar::find($id);
        $validatedData = $request->validate([
            'balasan_admin' => 'required|string',
        ]);
        $komentar->update($validatedData);


        return redirect('dashboard/komentar')->with('successupdate', 'Update Successfull!');
    }

    public function destroy($id)
    {
        $komentar = Komentar::find($id);
        $komentar->delete();
        return redirect('dashboard/komentar')->with('successdelete', 'Delete Successfull!');
    }

    public function KomentarWeb(Request $request)
    {
        $validatedData = $request->validate([
            'komentar' => 'required|string',

        ]);
        $validatedData['user_id'] = auth()->user()->id;

        if ($komentar = Komentar::where('user_id', auth()->user()->id)->first()) {
            $validatedData['balasan_admin'] = null;
            $komentar->update($validatedData);
        } else {
            Komentar::create($validatedData);
        }

        return redirect('/')->with('successcreate', 'Create Successfull!');
    }
    public function destroyWeb($id)
    {
        $komentar = Komentar::find($id);
        $komentar->delete();
        return redirect('/')->with('successdelete', 'Delete Successfull!');
    }
}
