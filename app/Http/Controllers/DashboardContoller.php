<?php

namespace App\Http\Controllers;

use App\Models\Krama;
use App\Models\transaksi;
use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    public function index()
    {
        $title = "Dashboard";

        $krama = Krama::where('jbt', '1')->where('stts_dlm_klrg', '1')->count();
        $pendapatan = transaksi::get();
        $total_pendapatan = 0;
        foreach ($pendapatan as $item) {
            $total_pendapatan += $item->total;
        }
        return view('page.dashboard', compact('title', 'krama', 'total_pendapatan'));
    }
}
