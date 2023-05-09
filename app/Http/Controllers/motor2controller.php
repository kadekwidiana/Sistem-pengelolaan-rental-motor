<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;
use Illuminate\Support\Facades\Storage;

class Motor2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motors = Motor::all();
        return view('motors.index', [
            'title' => 'Data Motor',
            'active' => 'Motor'
        ], compact('motors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motors.create', [
            'title' => 'Data Motor',
            'active' => 'Motor'
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
        $validatedData = $request->validate([
            'plat_motor' => 'required|string|max:10|unique:motors',
            'nama_motor' => 'required|string|max:20',
            'warna' => 'required|in:merah,kuning,hijau,biru,hitam,putih',
            'tipe' => 'required|in:yamaha,honda,suzuki',
            'tahun' => 'required|numeric|digits:4',
            'tgl_pajak' => 'required|date',
            'nama_pemilik' => 'required|string|max:100',
            'cc' => 'required|numeric|digits:3',
            'harga_sewa' => 'required|string|max:10',
            'status' => 'required|numeric|digits:1',
            'gambar_motor' => 'required',
            'tgl_catat' => 'required|date'
        ]);

        if ($request->file('gambar_motor')) {
            $vallidatedData['gambar_motor'] = $request->file('gambar_motor')->store('motors-image');
        }

        Motor::create($validatedData);
        return redirect()->route('motors.index')->with('success', 'Motor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($plat_motor)
    {
        $motor = Motor::findOrFail($plat_motor);
        return view('motors.show', [
            'title' => 'Data Motor',
            'active' => 'Motor',
            'motor' => $motor
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($plat_motor)
    {
        $motor = Motor::findOrFail($plat_motor);
        return view(
            'motors.edit',
            [
                'title' => 'Data Motor',
                'active' => 'Motor'
            ],
            compact('motor')
        );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $plat_motor)
    {
        $validatedData = $request->validate([
            'nama_motor' => 'required|string|max:20',
            'warna' => 'required|string|max:10',
            'tipe' => 'required|string|max:10',
            'tahun' => 'required|numeric|digits:4',
            'tgl_pajak' => 'required|date',
            'nama_pemilik' => 'required|string|max:100',
            'cc' => 'required|numeric|digits:3',
            'harga_sewa' => 'required|string|max:10',
            'status' => 'required|numeric|digits:1',
            'gambar_motor' => 'required',
            'tgl_catat' => 'required|date'
        ]);

        $motor = Motor::findOrFail($plat_motor);
        $motor->update($validatedData);

        return redirect()->route('motors.index')->with('success', 'Motor updated successfully.');
    }
    //     public function edit($plat_motor)
    // {
    //     $motor = Motor::findOrFail($plat_motor);
    //     return view('motors.edit', compact('motor'));
    // }

    // public function update(Request $request, $plat_motor)
    // {
    //     $motor = Motor::findOrFail($plat_motor);

    //     $motor->nama_motor = $request->input('nama_motor');
    //     $motor->warna = $request->input('warna');
    //     $motor->tipe = $request->input('tipe');
    //     $motor->tahun = $request->input('tahun');
    //     $motor->tgl_pajak = $request->input('tgl_pajak');
    //     $motor->nama_pemilik = $request->input('nama_pemilik');
    //     $motor->cc = $request->input('cc');
    //     $motor->harga_sewa = $request->input('harga_sewa');
    //     $motor->status = $request->input('status');
    //     $motor->gambar_motor = $request->input('gambar_motor');
    //     $motor->tgl_catat = $request->input('tgl_catat');

    //     $motor->save();

    //     // return redirect()->route('motors.show', $plat_motor)->with('success', 'Motor updated successfully.');
    //     return redirect()->route('motors.index')->with('success', 'Motor updated successfully.');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($plat_motor)
    {
        $motor = Motor::findOrFail($plat_motor);
        $motor->delete();

        return redirect()->route('motors.index')->with('success', 'Motor deleted successfully.');
    }
}
