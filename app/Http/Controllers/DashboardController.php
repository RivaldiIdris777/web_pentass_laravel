<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Peserta;
use App\Models\Slider;

class DashboardController extends Controller
{
    protected function authenticated($request, $user) {
        if ($user->hasRole('admin')) {
            return redirect('/');
        }
    }
 
    public function index() {

        if ($user->hasRole('admin')) {
            return redirect('/');
        }
        
        $lomba = Lomba::latest()->get();
        $peserta = Peserta::latest()->get();
        $slider = Slider::latest()->get();

        
        return view('pages.admin.dashboard.index', compact('lomba','peserta','slider'));
    }    
}
