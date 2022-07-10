<?php

namespace App\Http\Controllers;

use App\Models\BanjarAdat;
use Illuminate\Http\Request;

class BanjarAdatController extends Controller
{
    public function select(Request $request)
    {
        $banjarAdat = [];

        if ($request->has('q')) {
            $search = $request->q;
            $banjarAdat = BanjarAdat::select("id_banjar_adat", "nama_banjar_adat")->where('nama_banjar_adat', 'LIKE', "%$search%")->get();
        } else {
            $banjarAdat = BanjarAdat::limit(5)->get();
        }
        return response()->json($banjarAdat);
    }
}
