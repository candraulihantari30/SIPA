<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Ngayah';
        $jdl = Kegiatan::paginate(5);
        return view('admin.jdkegiatan.index', compact('jdl', 'title'));
    }


    public function create()
    {
        $title = 'Tambah Data Ngayah';
        $jdl = Kegiatan::all();
        return view(
            'admin.jdkegiatan.create',
            compact(
                'title',
                'jdl'
            )
        );
    }

    public function store(Request $request)
    {
        $ValidateData = $request->validate([
            'nm_kgtn'           => 'required|max:100',
            'tmpt'              => 'required|max:100',
            'tgl'               => 'required',
            'jam'               => 'required|max:100',
            'interval'          => 'required|max:100',
            'peserta'           => 'required|max:100',
        ]);
        // dd($ValidateData);
        Kegiatan::create($ValidateData);
        return redirect('JadwalKegiatan')->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id_kegiatan)
    {
        $title = 'Edit Data Ngayah';
        $jdl = Kegiatan::find($id_kegiatan);
        return view('admin.jdkegiatan.edit', compact('title', 'jdl'));
    }

    public function update(Request $request, $id_kegiatan)
    {
        $ValidateData = $request->validate([
            'nm_kgtn'           => 'required|max:100',
            'tmpt'              => 'required|max:100',
            'tgl'               => 'required',
            'jam'               => 'required|max:100',
            'interval'          => 'required|max:100',
            'peserta'           => 'required|max:100',
            'kategori'          => 'required',
        ]);

        Kegiatan::where('id_kegiatan', $id_kegiatan)->update($ValidateData);
        return redirect('JadwalKegiatan')->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kegiatan)
    {
        $jdl = Kegiatan::find($id_kegiatan);
        Kegiatan::destroy($id_kegiatan);

        return redirect('JadwalKegiatan')->with('success', 'Data Jadwal Kegiatan sudah berhasil terhapus !');
    }
}
