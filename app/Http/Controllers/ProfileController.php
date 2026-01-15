<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alamat;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('userpage.layouts.profile.index');
    }

    public function setting()
    {
        return view('userpage.layouts.profile.setting');
    }

    public function settingUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'foto' => 'image',
            'no_hp' => 'nullable',
        ]);



        if (isset($request->foto)) {
            $validatedData['foto'] = $request->foto->store('user', 'public');
        }
        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect('/profile');
    }

    public function hapusAvatar()
    {
        if (file_exists(public_path('storage/' . auth()->user()->foto)) && isset(auth()->user()->foto)) {
            unlink(public_path('storage/' . auth()->user()->foto));
        }

        User::find(auth()->user()->id)->update(['foto' => null]);

        return redirect('/profile');
    }

    public function settingAdmin()
    {
        return view('dashboard.profile.setting');
    }

    public function settingUpdateAdmin(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'foto' => 'image',
            'no_hp' => 'nullable',
        ]);



        if (isset($request->foto)) {
            $validatedData['foto'] = $request->foto->store('user', 'public');
        }
        User::where('id', auth()->user()->id)->update($validatedData);

        return redirect('/dashboard');
    }

    public function hapusAvatarAdmin()
    {
        if (file_exists(public_path('storage/' . auth()->user()->foto)) && isset(auth()->user()->foto)) {
            unlink(public_path('storage/' . auth()->user()->foto));
        }

        User::find(auth()->user()->id)->update(['foto' => null]);

        return response()->json('success');
    }
}
