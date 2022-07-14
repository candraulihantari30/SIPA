<?php

namespace App\Http\Controllers;

use App\Models\Dedosan;
use App\Models\Krama;
use App\Models\Presensi;
use App\Models\RekapAbsen;
use App\Models\Rekapabsn;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapAbsenController extends Controller
{
    public function dataindex()
    {
        $title = "Rekap Absensi Krama";
        $rekap = Krama::select(
            'id',
            'nm',
            'nik',
            'bnjr_adt',
            'tmpkn',
            DB::raw('SUM(kehadiran = "hadir") as hadir'),
            DB::raw('SUM(kehadiran = "izin") as izin'),
            DB::raw('SUM(kehadiran = "alpa") as alpa')
        )->join('presensis', 'kramas.id', '=', 'presensis.krama_id')->where('id', Auth::guard('krama')->user()->id)
            ->groupBy('id')->get();

        return view('admin.rekap.data-rekap-krama', compact('title', 'rekap'));
    }

    public function index()
    {
        $title = "Rekap Absensi Krama";
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
        )->join('presensis', 'kramas.id', '=', 'presensis.krama_id')
            ->groupBy('id')->get();
        return view('admin.rekap.index', compact('title', 'absensi', 'rekap'));
    }

    public function store(Request $request)
    {
        $dedosan = Dedosan::first();
        for ($i = 0; $i < count($request->krama_id); $i++) {
            $rekapAbsen = new RekapAbsen();
            $rekapAbsen->krama_id = $request->krama_id[$i];
            $rekapAbsen->hadir = $request->hadir[$i];
            $rekapAbsen->izin = $request->izin[$i];
            $rekapAbsen->tidak_hadir = $request->tidak_hadir[$i];
            $rekapAbsen->nominal = $request->tidak_hadir[$i] * $dedosan->nominal_dedosan;
            $rekapAbsen->status_pembayaran = "Belum Bayar";
            $rekapAbsen->periode = Carbon::now()->isoFormat('Y');
            $rekapAbsen->jenis = "denda";
            $rekapAbsen->save();
        }
        return redirect()->back()->with('success', 'Data Berhasil di Rekap');
    }

    public function detailrekap($krama_id)
    {
        $title = "Detail Absen";
        $detail = Presensi::with('dataKrama', 'dataKegiatan')->where('krama_id', $krama_id)->get();
        return view('admin.rekap.detail-rekap', compact('title', 'detail'));
    }
}
