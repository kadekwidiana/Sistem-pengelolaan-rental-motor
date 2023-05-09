<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $pegawais = User::all();

        return view('pegawai.index', [
            'title' => 'Operator & Pegawai',
            'active' => 'Pegawai'
        ], compact('pegawais'));
    }

    public function create()
    {
        return view('pegawai.create', [
            'title' => 'Operator & Pegawai',
            'active' => 'Pegawai'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            'is_admin' => 'required',
        ]);

        $user = User::create([
            'nama_pegawai' => $request->nama_pegawai,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);

        // User::create($user->all());

        return redirect()->route('pegawai.index')
            ->with('success', 'Pegawai created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('pegawai.index')->with('success', 'User deleted successfully.');
    }

    public function statusPegawai(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 1]);

        return redirect()->route('pegawai.index')->with('success', 'Status Pegawai di perbarui');
    }

    public function statusNonAktif(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 0]);

        return redirect()->route('pegawai.index')->with('success', 'Status Pegawai di perbarui');
    }
}
