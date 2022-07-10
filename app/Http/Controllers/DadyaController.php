<?php

namespace App\Http\Controllers;

use App\Models\Dadya;
use App\Models\BanjarAdat;
use App\Models\Nmddy;
use Illuminate\Http\Request;

class DadyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Ketua Dadya';
        $title_content = 'Data Nama Ketua Dadya & Nama Dadya';
        $ddy = Dadya::with('ddys', 'BanjarAdat')->latest()->paginate(5);
        return view('admin.dadya.index', compact('ddy', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Ketua Dadya';
        $title_content = 'Tambah Data Nama Ketua Dadya & Nama Dadya';
        $banjarAdat = BanjarAdat::all();
        $ddys = Nmddy::all();
        return view(
            'admin.dadya.create',
            compact(
                'title',
                'banjarAdat',
                'ddys',
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
        $ValidateData = $request->validate([
            'nm_kt'           => 'required',
            'nm_ddy'          => 'required',
            'alamat'          => 'required',
        ]);

        foreach ($ValidateData as $data) {
            Dadya::create($data);
        }

        return redirect('Dadya')->with('success', 'Data Berhasil diinput !');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_ddy)
    {
        $title = 'Edit Data Nama Ketua Dadya & Nama Dadya';
        $banjarAdat = BanjarAdat::all();
        $ddys = Nmddy::all();
        $dadya = Dadya::find($id_ddy);
        return view('admin.dadya.edit', compact('title', 'banjarAdat', 'ddys', 'dadya'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_ddy)
    {
        $ValidateData = $request->validate([
            'nm_kt'           => 'required',
            'nm_ddy'          => 'required',
            'alamat'          => 'required',
        ]);

        // dd($ValidateData);

        Dadya::where('id_ddy', $id_ddy)->update($ValidateData);

        return redirect('dadya')->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_ddy)
    {
        //
    }
}
