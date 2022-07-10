<?php

namespace App\Http\Controllers;

use App\Models\Irnw;
use App\Models\Krama;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotaController extends Controller
{
    public function index()
    {
        $title = "Nota Pembayaran";
        $nota = Krama::with('tempekan', 'banjarAdat');
        return view('admin.nota.index', compact('nota', 'title'));
    }

    public function urunan()
    {
        $nota_urunan = Irnw::with('krama', 'status')->where('nik_krama', Auth::guard('krama')->user()->id)->first();
        return view('krama.nota.nota_urunan', compact('nota_urunan'));
    }
}
