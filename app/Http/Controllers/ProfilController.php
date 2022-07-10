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
use App\Models\JabatanPrajuru;
use App\Models\Nmddy;
use App\Models\PrajuruAdat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    // Krama
    public function detail($id)
    {
        $title = 'Detail Profil Krama';
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
        return view('profil.detail-krama', compact('title', 'nmddy', 'jenisKelamin', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya'));
    }

    public function edit($id)
    {
        $title = "Edit Profil Krama";
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
        return view('profil.edit-krama', compact('title', 'nmddy', 'jenisKelamin', 'status_keluarga', 'status_krama', 'jabatan', 'krama_desa', 'tempekan', 'banjarAdat', 'today', 'jenispendidikan', 'jenispekerjaan', 'keterangan', 'dadya'));
    }

    public function update(Request $request, $id)
    {
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

        $ValidateData['password'] = Hash::make($ValidateData['password']);
        if ($request->file('ft')) {
            if ($request->oldFt) {
                Storage::delete($request->oldFt);
            }
            $ValidateData['ft'] = $request->file('ft')->store('image-krama');
        }
        Krama::where('id', $id)->update($ValidateData);

        return redirect()->back()->with('success', 'Profil Berhasil di ubah !');
    }

    // Prajuru
    public function profilPrajuru($id)
    {
        $title = 'Edit Prajuru Desa Adat';
        $jenisKelamin = JenisKelamin::all();
        $jabatanPrajuru = JabatanPrajuru::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $prajuru = PrajuruAdat::find($id);
        return view('admin.prajuru.edit', compact('title', 'jenisKelamin', 'jabatanPrajuru', 'tempekan', 'banjarAdat', 'prajuru'));
    }

    public function editPrajuru($id)
    {
        $title = 'Edit Prajuru Desa Adat';
        $jenisKelamin = JenisKelamin::all();
        $jabatanPrajuru = JabatanPrajuru::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $prajuru = PrajuruAdat::find($id);
        return view('admin.prajuru.edit', compact('title', 'jenisKelamin', 'jabatanPrajuru', 'tempekan', 'banjarAdat', 'prajuru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePrajuru(Request $request, $id)
    {
        $ValidateData = $request->validate([
            'nik' => 'required',
            'nama_pegawai' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
            'banjar_adat' => 'required',
            'tempekan_id' => 'required',
            'tempat' => 'required',
            'tangal_lahir' => 'required',
            'foto'  => '',
            'password' => '',
        ]);

        $ValidateData['password'] = Hash::make($ValidateData['password']);
        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $validateData['foto'] = $request->file('foto')->store('image-prajuru');
        }
        PrajuruAdat::where('id', $id)->update($validateData);

        return redirect('prajuru')->with('success', 'Data Prajuru Desa Adat Berhasil diinput!');
    }
}
