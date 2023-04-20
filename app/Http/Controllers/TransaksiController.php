<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Motor;
use App\Models\Pegawai;
use App\Models\Penyewa;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('motor', 'penyewa', 'pegawai')->get();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $motors = Motor::all();
        $penyewas = Penyewa::all();
        $pegawais = Pegawai::all();
        return view('transaksi.create', compact('motors', 'penyewas', 'pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksis,kode_transaksi',
            'plat_motor' => 'required',
            'no_paspor' => 'required',
            'id_pegawai' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'total' => 'required',
            'km_awal' => 'required',
            'km_akhir' => 'required',
        ]);

        // memperbarui status motor
        $motor = Motor::where('plat_motor', $request->input('plat_motor'))->firstOrFail();
        $motor->status = 0;
        $motor->save();

        Transaksi::create($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi created successfully.');
    }

    public function show($kode_transaksi)
    {
        $transaksi = Transaksi::with('motor', 'penyewa', 'pegawai')->where('kode_transaksi', $kode_transaksi)->first();
        return view('transaksi.show', compact('transaksi'));
    }

    public function edit($kode_transaksi)
    {
        $transaksi = Transaksi::with('motor', 'penyewa', 'pegawai')->where('kode_transaksi', $kode_transaksi)->first();
        $motors = Motor::all();
        $penyewas = Penyewa::all();
        $pegawais = Pegawai::all();
        return view('transaksi.edit', compact('transaksi', 'motors', 'penyewas', 'pegawais'));
    }

    public function pengembalian(Request $request, $kode_transaksi)
    {
        $request->validate([
            'plat_motor' => 'required',
            'no_paspor' => 'required',
            'id_pegawai' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'total' => 'required',
            'km_awal' => 'required',
            'km_akhir' => 'required',
        ]);

        // memperbarui status motor
        $motor = Motor::where('plat_motor', $request->input('plat_motor'))->firstOrFail();
        $motor->status = 1;
        $motor->save();

        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->first();
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dikembalikan');
    }

    public function pengembalianForm($kode_transaksi)
    {
        $transaksi = Transaksi::with('motor', 'penyewa')->where('kode_transaksi', $kode_transaksi)->first();
        $motors = Motor::all();
        $penyewas = Penyewa::all();
        $pegawais = Pegawai::all();
        return view('transaksi.pengembalian', compact('transaksi', 'motors', 'penyewas', 'pegawais'));
    }

    public function update(Request $request, $kode_transaksi)
    {
        $request->validate([
            'plat_motor' => 'required',
            'no_paspor' => 'required',
            'id_pegawai' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'total' => 'required',
            'km_awal' => 'required',
            'km_akhir' => 'required',
        ]);

        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->first();
        $transaksi->update($request->all());

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi updated successfully');
    }

    public function destroy($kode_transaksi)
    {
        $transaksi = Transaksi::where('kode_transaksi', $kode_transaksi)->first();
        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi deleted successfully');
    }
}
