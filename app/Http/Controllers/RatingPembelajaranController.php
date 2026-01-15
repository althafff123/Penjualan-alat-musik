<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pembelajaran;
use App\Models\RatingPembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RatingPembelajaranController extends Controller

{

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $rating_pembelajaran = RatingPembelajaran::where(function ($q) use ($keyword) {
            $q->where('komentar', 'LIKE', '%' . $keyword . '%');
            $q->orWhere('balasan_admin', 'LIKE', '%' . $keyword . '%');
            $q->orWhereHas('pembelajaran', function ($q) use ($keyword) {
                $q->where('nama_pembelajaran', 'LIKE', '%' . $keyword . '%');
            });
            $q->orWhereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%');
            });
        })->Paginate(3);
        $rating_pembelajaran->withpath('/dashboard/rating_pembe$rating_pembelajaran');
        $rating_pembelajaran->appends($request->all());
        return view('dashboard.rating_pembelajaran.index', compact(
            'rating_pembelajaran',
            'keyword',
        ));
    }

    public function edit($id)
    {
        $rating_pembelajaran = RatingPembelajaran::find($id);
        return view('dashboard.rating_pembelajaran.balas', compact(
            'rating_pembelajaran',
        ));
    }

    public function update(Request $request, $id)
    {
        $rating_pembelajaran = RatingPembelajaran::find($id);
        $validatedData = $request->validate([
            'balasan_admin' => 'required|string',
        ]);
        $rating_pembelajaran->update($validatedData);


        return redirect('dashboard/rating_pembelajaran')->with('successupdate', 'Update Successfull!');
    }

    public function destroy($id)
    {
        $rating_pembelajaran = RatingPembelajaran::find($id);
        $rating_pembelajaran->delete();
        return redirect('dashboard/rating_pembelajaran')->with('successdelete', 'Delete Successfull!');
    }

    public function indexUser($id)
    {
        $pembelajaran = Pembelajaran::find($id);
        $rating_pembelajaran = RatingPembelajaran::where('user_id', auth()->user()->id)->where('pembelajaran_id', $id)->first();
        return view('userpage.layouts.rating_pembelajaran', compact('pembelajaran', 'rating_pembelajaran'));
    }

    public function post(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'komentar' => 'required|string',
            'rating' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['pembelajaran_id'] = Pembelajaran::find($id)->id;
        if ($rating_pembelajaran = RatingPembelajaran::where('user_id', auth()->user()->id)->where('pembelajaran_id', $validatedData['pembelajaran_id'])->first()) {
            $rating_pembelajaran->update($validatedData);
        } else {
            Ratingpembelajaran::create($validatedData);
        }
        return redirect('/')->with('successcreate', 'Create Successfull!');
    }
}
