<?php

namespace App\Http\Controllers;

use App\Models\BanjarAdat;
use App\Models\Jabatan;
use App\Models\JenisKelamin;
use App\Models\JenisPekerjaan;
use App\Models\JenisPendidikan;
use App\Models\Krama;
use App\Models\Status;
use App\Models\Keterangan;
use App\Models\StatusKeluarga;
use App\Models\Tempekan;
use App\Models\Dadya;
use App\Models\Irnw;
use App\Models\Nmddy;
use App\Models\Rekapabsn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Str::length(Auth::guard('krama')->user()) > 0) {
            if (Auth::guard('krama')->user()->level = 'krama') {
                $title = "Data Keluarga";
                $klrg = Krama::with('jabatan', 'jenisKelamin', 'status', 'statusKeluarga', 'tempekan', 'banjarAdat', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'nmddy', 'ketuaDadya')->where('no_kk', Auth::user()->no_kk)->first();
                $keluarga = Krama::with('jabatan', 'jenisKelamin', 'status', 'statusKeluarga', 'tempekan', 'banjarAdat', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'nmddy', 'ketuaDadya')->where('no_kk', Auth::user()->no_kk)->paginate(5);
                return view('krama.keluarga.index', compact('keluarga', 'title', 'klrg'));
            }
        }
        $title = 'Data Krama';
        $krama_desa = Krama::with('jabatan', 'jenisKelamin', 'status', 'statusKeluarga', 'tempekan', 'banjarAdat', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'nmddy', 'ketuaDadya')->where('stts_dlm_klrg', '=', '1')->where('jbt', '=', '1')->paginate(5);
        return view('admin.krama.index', compact('krama_desa', 'title'));
    }

    public function keluarga()
    {
        $title = "Data Keluarga";
        return view('krama.keluarga.index', compact('keluarga', 'title'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Krama';
        $jenisKelamin = JenisKelamin::all();
        $status_krama = Status::all();
        $status_keluarga = StatusKeluarga::all();
        $jabatan = Jabatan::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $krama_desa = Krama::all();
        $keterangan = Keterangan::all();
        $jenispendidikan = JenisPendidikan::all();
        $jenispekerjaan = JenisPekerjaan::all();
        $dadya = Dadya::all();
        $nmddy = Nmddy::all();
        if (Str::length(Auth::guard('krama')->user()) > 0) {
            if (Auth::guard('krama')->user()->level = 'krama') {
                $title = "Tambah Data Keluarga";
                return view(
                    'admin.krama.create',
                    compact(
                        'title',
                        'jenisKelamin',
                        'status_krama',
                        'status_keluarga',
                        'jabatan',
                        'tempekan',
                        'banjarAdat',
                        'keterangan',
                        'jenispendidikan',
                        'jenispekerjaan',
                        'dadya',
                        'nmddy',
                        'krama_desa'
                    )
                );
            }
        }
        return view(
            'admin.krama.create',
            compact(
                'title',
                'jenisKelamin',
                'status_krama',
                'status_keluarga',
                'jabatan',
                'tempekan',
                'banjarAdat',
                'keterangan',
                'jenispendidikan',
                'jenispekerjaan',
                'dadya',
                'nmddy',
                'krama_desa'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($ValidateData);
        $ValidateData = $request->validate([
            'nik'           => 'required|numeric|min:16|unique:kramas',
            'no_kk'         => 'required|numeric|min:16',
            'nm'            => 'required|max:55',
            'tmpt'          => 'required',
            'tgl'           => 'required',
            'stts_dlm_klrg' => 'required',
            'jbt'           => 'required',
            'bnjr_adt'      => 'required',
            'tmpkn'         => 'required',
            'stts'          => 'required',
            'pndd'          => 'required',
            'pkrjn'         => 'required',
            'jk'            => 'required',
            'ktrgn'         => 'required',
            'ft'            => 'image|file|max:2048',
            'nm_kt_ddy'     => 'required',
            'nm_ddy'        => 'required',
            'password'      => 'required',
            'level'         => ''
        ]);
        // dd($ValidateData);

        if ($request->file('ft')) {
            $ValidateData['ft'] = $request->file('ft')->store('image-krama');
        }
        $ValidateData['password'] = Hash::make($ValidateData['password']);

        if ($ValidateData['stts_dlm_klrg'] == 1) {
            $ValidateData['level'] = 'krama';
        }
        // dd($ValidateData);
        $id_krama = Krama::create($ValidateData);

        $biaya_urunan = Status::where('id', $ValidateData['stts'])->first();

        if (Str::length(Auth::guard('krama')->user()) > 0) {
            if (Auth::guard('krama')->user()->level = 'krama') {
                return redirect('keluarga')->with('success', 'Data Krama Berhasil diinput !');
            }
        }
        return redirect('krama')->with('success', 'Data Krama Berhasil diinput !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Data Krama';
        $jenisKelamin = JenisKelamin::all();
        $status_krama = Status::all();
        $status_keluarga = StatusKeluarga::all();
        $jabatan = Jabatan::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $keterangan = Keterangan::all();
        $jenispendidikan = JenisPendidikan::all();
        $jenispekerjaan = JenisPekerjaan::all();
        $dadya = Dadya::all();
        $nmddy = Nmddy::all();
        $krama_desa = Krama::find($id);
        $today = Carbon::parse($krama_desa->tgl)->isoFormat('D MMMM Y');
        if (Str::length(Auth::guard('krama')->user()) > 0) {
            if (Auth::guard('krama')->user()->level = 'krama') {
                return view('admin.krama.detail-krama', compact('title', 'nmddy', 'jenisKelamin', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya'));
            }
        }
        return view('admin.krama.detail-krama', compact('title', 'nmddy', 'jenisKelamin', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya'));
    }

    public function detailKeluarga($id)
    {
        $title = 'Detail Data Keluarga Krama';
        $jenisKelamin = JenisKelamin::all();
        $status_krama = Status::all();
        $status_keluarga = StatusKeluarga::all();
        $jabatan = Jabatan::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $keterangan = Keterangan::all();
        $jenispendidikan = JenisPendidikan::all();
        $jenispekerjaan = JenisPekerjaan::all();
        $dadya = Dadya::all();
        $nmddy = Nmddy::all();
        $krama_desa = Krama::find($id);
        $keluarga = Krama::where('no_kk', '=', $krama_desa->no_kk)->get();
        $tanggal = Krama::all();
        $today = Carbon::parse($krama_desa->tgl)->isoFormat('D MMMM Y');
        // if (Str::length(Auth::guard('krama')->user()) > 0) {
        //     if (Auth::guard('krama')->user()->level = 'krama') {
        //         $keluarga_detail = Krama::where('no_kk', '=', $krama_desa->no_kk)->get();
        //         $keluarga = Krama::find($id);
        //         return view('admin.krama.detail-keluarga', compact('title', 'nmddy', 'jenisKelamin', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya', 'keluarga', 'keluarga_detail'));
        //     }
        // }

        return view('admin.krama.detail-keluarga', compact('title', 'nmddy', 'jenisKelamin', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya', 'keluarga'));
    }

    // Krama
    public function keluargadetail($id)
    {
        $title = 'Detail Data Keluarga Krama';
        $jenisKelamin = JenisKelamin::all();
        $status_krama = Status::all();
        $status_keluarga = StatusKeluarga::all();
        $jabatan = Jabatan::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $keterangan = Keterangan::all();
        $jenispendidikan = JenisPendidikan::all();
        $jenispekerjaan = JenisPekerjaan::all();
        $dadya = Dadya::all();
        $nmddy = Nmddy::all();
        $keluarga = Krama::find($id);
        $keluargaDetail = Krama::where('no_kk', '=', $keluarga->no_kk)->get();
        $tanggal = Krama::all();
        $today = Carbon::parse($keluarga->tgl)->isoFormat('D MMMM Y');

        return view('krama.keluarga.detail_keluarga', compact('title', 'nmddy', 'jenisKelamin', 'status_keluarga', 'status_krama', 'jabatan', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya', 'keluarga', 'keluargaDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data Krama';
        $jenisKelamin = JenisKelamin::all();
        $status_krama = Status::all();
        $status_keluarga = StatusKeluarga::all();
        $jabatan = Jabatan::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $krama_desa = Krama::find($id);
        $keterangan = Keterangan::all();
        $jenispendidikan = JenisPendidikan::all();
        $jenispekerjaan = JenisPekerjaan::all();
        $nmddy = Nmddy::all();
        $dadya = Dadya::all();
        $today = Carbon::parse($krama_desa->tgl)->isoFormat('D MMMM Y');
        if (Str::length(Auth::guard('krama')->user()) > 0) {
            if (Auth::guard('krama')->user()->level = 'krama') {
                $keluarga = Krama::find($id);
                return view('admin.krama.edit', compact('title', 'jenisKelamin', 'nmddy', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya', 'keluarga'));
            }
        }
        return view('admin.krama.edit', compact('title', 'jenisKelamin', 'nmddy', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya'));
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
        // dd($ValidateData);
        $ValidateData = $request->validate([
            'nik'           => 'required|numeric|min:16',
            'no_kk'         => 'required|numeric|min:16',
            'nm'            => 'required|max:55',
            'tmpt'          => 'required',
            'tgl'           => 'required',
            'stts_dlm_klrg' => 'required',
            'jbt'           => 'required',
            'bnjr_adt'      => 'required',
            'tmpkn'         => 'required',
            'stts'          => 'required',
            'pndd'          => 'required',
            'pkrjn'         => 'required',
            'jk'            => 'required',
            'ktrgn'         => 'required',
            'ft'            => 'image|file|max:2048',
            'nm_ddy'        => 'required',
            'nm_kt_ddy'     => 'required',
            'password'      => '',
        ]);

        // dd($ValidateData);
        if ($request->file('ft')) {
            if ($request->oldFt) {
                Storage::delete($request->oldFt);
            }
            $ValidateData['ft'] = $request->file('ft')->store('image-krama');
        }
        $ValidateData['password'] = Hash::make($ValidateData['password']);
        Krama::where('id', $id)->update($ValidateData);
        if (Str::length(Auth::guard('krama')->user()) > 0) {
            if (Auth::guard('krama')->user()->level = 'krama') {
                return redirect('keluarga')->with('success', 'Data Keluarga Berhasil di edit !');
            }
        }
        return redirect('krama')->with('success', 'Data Krama Berhasil diinput !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $krama_desa = Krama::find($id);

        if (Storage::delete($krama_desa->ft)) {
            $krama_desa->delete();
        } else {
            Krama::destroy($id);
        }
        // Krama::destroy($id);

        return redirect('krama')->with('succss', 'Data Krama sudah berhasil terhapus !');
    }
}
