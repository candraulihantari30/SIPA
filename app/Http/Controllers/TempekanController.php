<?php

namespace App\Http\Controllers;

use App\Models\Tempekan;

class TempekanController extends Controller
{
    public function select($id)
    {
        $tempekan = Tempekan::where('banjar_adat_id', $id)->get();
        return response()->json($tempekan);
    }
}
