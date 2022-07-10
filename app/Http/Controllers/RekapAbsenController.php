<?php

namespace App\Http\Controllers;

use App\Models\Krama;
use App\Models\Presensi;
use App\Models\RekapAbsen;
use App\Models\Rekapabsn;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RekapAbsenController extends Controller
{
    public function index()
    {
        $title = "Absensi Krama";
        $krama = Krama::where('stts_dlm_klrg', '=', '1')->where('stts', '=', '1')->get();
        $absensi = Presensi::with('dataKrama', 'dataKegiatan')->get();
        $rekap = Krama::select(
            'id',
            'nm',
            'nik',
            'bnjr_adt',
            'tmpkn',
            DB::raw('SUM(kehadiran = "hadir") as hadir'),
            DB::raw('SUM(kehadiran = "izin") as izin'),
            DB::raw('SUM(kehadiran = "alpa") as alpa')
        )->join('presensis', 'kramas.id', '=', 'presensis.krama_id')->groupBy('id')->get();
        return view('admin.rekap.index', compact('title', 'absensi', 'rekap'));
    }

    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->krama_id); $i++) {
            $rekapAbsen = new RekapAbsen();
            $rekapAbsen->krama_id = $request->krama_id[$i];
            $rekapAbsen->hadir = $request->hadir[$i];
            $rekapAbsen->izin = $request->izin[$i];
            $rekapAbsen->tidak_hadir = $request->tidak_hadir[$i];
            $rekapAbsen->nominal = $request->nominal[$i];
            $rekapAbsen->status_pembayaran = "Belum Bayar";
            $rekapAbsen->periode = $request->periode[$i];
            $rekapAbsen->jenis = $request->jenis[$i];
            // dd($rekapAbsen);
            $rekapAbsen->save();
        }

        return redirect()->back()->with('success', 'Data Berhasil di Rekap');
    }

    public function detailrekap($krama_id)
    {
        $title = "Detail Absen";
        $detail = Presensi::with('dataKrama', 'dataKegiatan')->find($krama_id);

        return view('admin.rekap.detail-rekap', compact('title', 'detail'));
    }
}
