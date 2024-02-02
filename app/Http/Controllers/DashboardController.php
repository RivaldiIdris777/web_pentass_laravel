<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Peserta;
use App\Models\Slider;

class DashboardController extends Controller
{
    public function index() {
        $lomba = Lomba::latest()->get();
        $peserta = Peserta::latest()->get();
        $slider = Slider::latest()->get();

        
        return view('pages.admin.dashboard.index', compact('lomba','peserta','slider'));
    }
}
