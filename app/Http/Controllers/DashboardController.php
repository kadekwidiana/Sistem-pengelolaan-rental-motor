<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Pengeluaran;
use App\Models\Motor;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalPendapatan = Transaksi::sum('total');
        $totalPengeluaran = Pengeluaran::sum('biaya_pengeluaran');

        $totalMotor = Motor::count();
        $totalPegawai = User::count();
        $totalPengeluaranMotor = Pengeluaran::count();
        $totalTransaksi = Transaksi::count();

        // Pendapatan per bulan
        $totalBulanJanuari = Transaksi::whereMonth('tgl_selesai', '=', '01')->sum('total');
        $totalBulanFebruari = Transaksi::whereMonth('tgl_selesai', '=', '02')->sum('total');
        $totalBulanMaret = Transaksi::whereMonth('tgl_selesai', '=', '03')->sum('total');
        $totalBulanApril = Transaksi::whereMonth('tgl_selesai', '=', '04')->sum('total');
        $totalBulanMei = Transaksi::whereMonth('tgl_selesai', '=', '05')->sum('total');
        $totalBulanJuni = Transaksi::whereMonth('tgl_selesai', '=', '06')->sum('total');
        $totalBulanJuli = Transaksi::whereMonth('tgl_selesai', '=', '07')->sum('total');
        $totalBulanAgustus = Transaksi::whereMonth('tgl_selesai', '=', '08')->sum('total');
        $totalBulanSeptember = Transaksi::whereMonth('tgl_selesai', '=', '09')->sum('total');
        $totalBulanOktober = Transaksi::whereMonth('tgl_selesai', '=', '10')->sum('total');
        $totalBulanNovember = Transaksi::whereMonth('tgl_selesai', '=', '11')->sum('total');
        $totalBulanDesember = Transaksi::whereMonth('tgl_selesai', '=', '12')->sum('total');
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'Dashboard'
        ], compact(
            [
                'totalPendapatan', 'totalPengeluaran', 'totalMotor', 'totalPegawai', 'totalPengeluaranMotor', 'totalTransaksi',
                'totalBulanJanuari',
                'totalBulanFebruari',
                'totalBulanMaret',
                'totalBulanApril',
                'totalBulanMei',
                'totalBulanJuni',
                'totalBulanJuli',
                'totalBulanAgustus',
                'totalBulanSeptember',
                'totalBulanOktober',
                'totalBulanNovember',
                'totalBulanDesember',
            ]
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
