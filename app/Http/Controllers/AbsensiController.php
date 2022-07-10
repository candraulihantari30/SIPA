<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Krama;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Absensi Krama";
        $absensi = Presensi::with('dataKrama', 'dataKegiatan')->get();
        $absensi_tempekan = Presensi::with('dataKegiatan')->join('kramas', 'presensis.krama_id', '=', 'kramas.id')->where('tmpkn', Auth::guard('prajuru')->user()->tempekan_id)->get();
        return view('admin.absensi.index', compact('title', 'absensi', 'absensi_tempekan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'krama_id'              => 'required',
            'id_kegiatan'           => 'required',
            'tgl_absen'             => '',
        ]);
        // dd($request);

        for ($i = 0; $i < count($request->id_kegiatan); $i++) {
            $absen = new Presensi();
            $absen->kehadiran = $request->kehadiran[$i];
            $absen->krama_id = $request->krama_id[$i];
            $absen->id_kegiatan = $request->id_kegiatan[$i];
            $absen->tgl_absen = $request->tgl_absen[$i];
            // dd($absen);
            $absen->save();
        }
        return redirect()->route('absensi.show', $request->kegiatan_id)->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_presensi)
    {
        $title = "Detai Absensi";
        $absen = Presensi::with('dataKrama', 'dataKegiatan')->find($id_presensi);
        $krama = Presensi::with('dataKrama')->where('id_kegiatan', $id_presensi)->get();
        return view('admin.absensi.show', compact('absen', 'title', 'krama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tambah($id_kegiatan)
    {
        $title = 'Tambah Data Absensi';
        $kegiatan = Kegiatan::find($id_kegiatan);
        $absensi = Presensi::all();
        $tgl_kegiatan = Carbon::parse($kegiatan->tgl)->isoFormat('D MMMM Y');
        $krama = Krama::where('stts_dlm_klrg', '=', '1')->where('stts', '=', '1')->where('tmpkn', Auth::guard('prajuru')->user()->tempekan_id)->get();
        $krama_desa = Krama::where('stts_dlm_klrg', '=', '1')->where('stts', '=', '1')->get();
        return view(
            'admin.absensi.create',
            compact(
                'title',
                'kegiatan',
                'krama',
                'absensi',
                'tgl_kegiatan',
                'krama_desa'
            )
        );
    }
}
