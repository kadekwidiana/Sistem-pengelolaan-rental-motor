<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Models\Motor;
use App\Models\User;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluarans = Pengeluaran::all();

        return view('pengeluaran.index', [
            'title' => 'Pengeluaran',
            'active' => 'Motor'
        ], compact('pengeluarans'));
    }

    public function create()
    {
        $motors = Motor::all();
        $pegawais = User::all();
        return view('pengeluaran.create', [
            'title' => 'Data Pengeluaran',
            'active' => 'Motor',
        ], compact('motors', 'pegawais'));
        // Tambahkan data plat motor baru ke variabel $motors
        // $motors->push(['merk_motor' => 'Honda', 'plat_motor' => 'ABC 1234']);
        // return view('pengeluaran.create', compact('motors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_motor' => 'required|string|max:15',
            'id_pegawai' => 'required|string|max:15',
            'tgl_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string|max:20',
            'biaya_pengeluaran' => 'required|string|max:10',
        ]);

        $pengeluaran = new Pengeluaran([
            'id_pengeluaran' => 'PG-' . str_pad(Pengeluaran::count() + 1, 5, '0', STR_PAD_LEFT),
            'plat_motor' => $request->get('plat_motor'),
            'id_pegawai' => $request->get('id_pegawai'),
            'tgl_pengeluaran' => $request->get('tgl_pengeluaran'),
            'jenis_pengeluaran' => $request->get('jenis_pengeluaran'),
            'biaya_pengeluaran' => $request->get('biaya_pengeluaran'),
        ]);

        $pengeluaran->save();

        return redirect('/pengeluarans')->with('success', 'Pengeluaran berhasil ditambahkan!');
    }

    public function show($id_pengeluaran)
    {
        $pengeluaran = Pengeluaran::findOrFail($id_pengeluaran);
        return view('pengeluarans.show', [
            'title' => 'Data Pengeluaran',
            'active' => 'Motor',
            'pengeluaran' => $pengeluaran
        ]);
    }

    public function edit($id_pengeluaran)
    {
        $motors = Motor::all();
        $pegawais = User::all();
        $pengeluarans = Pengeluaran::findOrFail($id_pengeluaran);
        return view('pengeluaran.edit', [
            'title' => 'Data Pengeluaran',
            'active' => 'Motor',
        ], compact('pengeluarans', 'motors', 'pegawais'));
        // Tambahkan data plat motor baru ke variabel $motors
        // $motors->push(['merk_motor' => 'Honda', 'plat_motor' => 'ABC 1234']);
        // return view('pengeluaran.create', compact('motors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_motor' => 'required|string|max:15',
            'id_pegawai' => 'required|string|max:15',
            'tgl_pengeluaran' => 'required|date',
            'jenis_pengeluaran' => 'required|string|max:20',
            'biaya_pengeluaran' => 'required|string|max:10',
        ]);

        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->plat_motor = $request->get('plat_motor');
        $pengeluaran->id_pegawai = $request->get('id_pegawai');
        $pengeluaran->tgl_pengeluaran = $request->get('tgl_pengeluaran');
        $pengeluaran->jenis_pengeluaran = $request->get('jenis_pengeluaran');
        $pengeluaran->biaya_pengeluaran = $request->get('biaya_pengeluaran');
        $pengeluaran->save();

        return redirect('/pengeluarans')->with('success', 'Pengeluaran berhasil diupdate!');
    }

    public function destroy($id_pengeluaran)
    {
        $pengeluaran = Pengeluaran::find($id_pengeluaran);
        $pengeluaran->delete();
        return redirect('/pengeluarans')->with('success', 'Pengeluaran berhasil dihapus!');
    }
}
