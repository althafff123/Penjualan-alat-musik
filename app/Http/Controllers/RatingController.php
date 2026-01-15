<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Barang;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller

{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $rating = Rating::where(function ($q) use ($keyword) {
            $q->where('komentar', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('balasan_admin', 'LIKE', '%' . $keyword . '%');
            $q->orWhereHas('barang', function ($q) use ($keyword) {
                $q->where('nama_barang', 'LIKE', '%' . $keyword . '%');
            });
            $q->orWhereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%');
            });
        })->Paginate(3);
        $rating->withpath('/dashboard/rating');
        $rating->appends($request->all());
        return view('dashboard.rating.index', compact(
            'rating',
            'keyword',
        ));
    }

    public function edit($id)
    {
        $rating = Rating::find($id);
        return view('dashboard.rating.balas', compact(
            'rating',
        ));
    }

    public function update(Request $request, $id)
    {
        $rating = Rating::find($id);
        $validatedData = $request->validate([
            'balasan_admin' => 'required|string',
        ]);
        $rating->update($validatedData);


        return redirect('dashboard/rating')->with('successupdate', 'Update Successfull!');
    }

    public function destroy($id)
    {
        $rating = Rating::find($id);
        $rating->delete();
        return redirect('dashboard/rating')->with('successdelete', 'Delete Successfull!');
    }
    public function indexUser($id)
    {
        $barang = Barang::find($id);
        $rating = Rating::where('user_id', auth()->user()->id)->where('barang_id', $id)->first();
        return view('userpage.layouts.rating', compact('barang', 'rating'));
    }


    public function post(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'komentar' => 'required|string',
            'foto' => 'nullable',
            'rating' => 'required'
        ]);
        // $rating = $request->all();
        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('rating-image', 'public');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['barang_id'] = Barang::find($id)->id;
        if ($rating = Rating::where('user_id', auth()->user()->id)->where('barang_id', $validatedData['barang_id'])->first()) {
            $rating->update($validatedData);
        } else {
            Rating::create($validatedData);
        }
        return redirect('/')->with('successcreate', 'Create Successfull!');
    }
}
