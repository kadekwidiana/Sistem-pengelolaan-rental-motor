<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motor;

class FrontPageController extends Controller
{
    public function viewMotor(Request $request)
    {
        $motors = Motor::all();
        return view('frontpage.motors', [
            'title' => 'Motor',
            'active' => 'Motor'
        ], compact('motors'));
    }

    public function viewHome(Request $request)
    {
        $motors = Motor::all();
        return view('frontpage.home', [
            'title' => 'Home',
            'active' => 'Home'
        ], compact('motors'));
    }
}
