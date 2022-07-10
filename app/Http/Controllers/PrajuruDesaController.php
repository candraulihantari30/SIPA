<?php

namespace App\Http\Controllers;

use App\Models\BanjarAdat;
use App\Models\JabatanPrajuru;
use App\Models\JenisKelamin;
use App\Models\PrajuruAdat;
use App\Models\Tempekan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class PrajuruDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Data Prajuru Desa Adat";
        $prajuru = PrajuruAdat::with('jenisKelamin', 'jabatanPrajuru', 'banjarAdat', 'tempekan')->latest()->paginate(4);
        return view('admin.prajuru.index', compact('title', 'prajuru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Prajuru Desa Adat';
        $jenisKelamin = JenisKelamin::all();
        $jabatanPrajuru = JabatanPrajuru::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        return view('admin.prajuru.create', compact('title', 'jenisKelamin', 'jabatanPrajuru', 'tempekan', 'banjarAdat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidateData = $request->validate([
            'nik' => 'required|unique:prajuru_adats',
            'nama_pegawai' => 'required',
            'jk' => 'required',
            'jabatan' => 'required',
            'banjar_adat' => 'required',
            'tempekan_id' => '',
            'tempat' => '',
            'tangal_lahir' => '',
            'foto' => 'required',
            'password' => '',
            'level' => ''
        ]);
        // dd($ValidateData);
        if ($request->file('foto')) {
            $ValidateData['foto'] = $request->file('foto')->store('image-prajuru');
        }
        $ValidateData['password'] = Hash::make($ValidateData['password']);
        if ($ValidateData['jabatan'] == 4 && $ValidateData['jabatan'] == 5) {
            $ValidateData['level'] = 'prajuru';
        } elseif ($ValidateData['jabatan'] == 6) {
            $ValidateData['level'] = 'kelian_tempekan';
        }
        // dd($ValidateData);
        PrajuruAdat::create($ValidateData);
        return redirect('prajuru')->with('success', 'Data Prajuru Desa Adat Berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Data Prajuru';
        $jenisKelamin = JenisKelamin::all();
        $jabatanPrajuru = JabatanPrajuru::all();
        $tempekan = Tempekan::all();
        $banjarAdat = BanjarAdat::all();
        $prajuru = PrajuruAdat::find($id);
        return view('admin.prajuru.detail', compact('title', 'jenisKelamin', 'prajuru', 'jabatanPrajuru', 'tempekan', 'banjarAdat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
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
            'password' => ''
        ]);

        // dd($ValidateData);
        if ($request->file('foto')) {
            if ($request->oldFoto) {
                Storage::delete($request->oldFoto);
            }
            $ValidateData['foto'] = $request->file('foto')->store('image-prajuru');
        }
        $ValidateData['password'] = Hash::make($ValidateData['password']);
        PrajuruAdat::where('id', $id)->update($ValidateData);

        return redirect('prajuru')->with('success', 'Data Prajuru Desa Adat Berhasil diinput!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prajuru = PrajuruAdat::find($id);

        if (Storage::delete($prajuru->foto)) {
            $prajuru->delete();
        } else {
            PrajuruAdat::destroy($id);
        }

        return redirect('prajuru')->with('succss', 'Data Prajuru sudah berhasil terhapus !');
    }
}
