<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function profile()
    {
        $data = Auth::user();
        return view('profile.index', [
            'title' => 'Edit Profil',
            'active' => 'Profile'
        ], compact('data'));
    }

    public function change_profile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $data = $request->validate([
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'username'  =>  'required',
            'email'  =>  'required|email:rfc,dns',
        ]);
        $user->update($data);
        return redirect()->route('profile')->with('success', 'Profil anda berhasil diupdate');
    }

    public function password()
    {
        return view('profile.password', [
            'title' => 'Ganti Password',
            'active' => 'Profile'
        ]);
    }

    public function change_password(Request $request)
    {
        $data = $request->validate([
            'old_password'  =>  'required',
            'password'  =>  'required|confirmed',
        ]);

        if (Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->route('change-password')->with('error', 'Password lama tidak cocok');
        }

        $user = User::find(auth()->user()->id);

        $user->update([
            'password'  =>  Hash::make($request->password)
        ]);

        return redirect()->route('change-password')->with('success', 'Password anda berhasil di ganti');
    }
}
