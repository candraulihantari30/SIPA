<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title = "Home";
        $tanggal = Carbon::now()->isoFormat('dddd, D MMMM Y');
        $jdl = Kegiatan::all();
        return view('layout-user.main', compact('title', 'jdl', 'tanggal'));
    }

    public function detailKegiatan($id_kegiatan)
    {
        $jadwal = Kegiatan::find($id_kegiatan);
        return view('layout-user.detail-kegiatan', compact('jadwal'));
    }
}
