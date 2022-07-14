<?php

namespace App\Http\Controllers;

use App\Models\Dedosan;
use App\Models\Irnw;
use App\Models\Krama;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UrunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Urunan Wajib';
        // $urunan = Irnw::with('krama', 'status')->get();
        // if (Str::length(Auth::guard('krama')->user()) > 0) {
        //     if (Auth::guard('krama')->user()->level = 'krama') {
        //         $urunan_krama = Irnw::with('krama', 'status')->where('nik_krama', Auth::guard('krama')->user()->id)->get();
        //         $bayar_urunan = Irnw::with('krama', 'status')->where('nik_krama', Auth::guard('krama')->user()->id)->first();
        //         return view('krama.urunan.index', compact('title', 'urunan_krama', 'bayar_urunan'));
        //     }
        // }
        $status_urunan = Status::get();
        $dedosan = Dedosan::get();
        $urunan_krama = Krama::with('status')->where('id', Auth::guard('krama')->user()->id)->first();
        return view('admin.urunan.index', compact('title', 'status_urunan', 'dedosan', 'urunan_krama'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Data Urunan';
        $krama = Krama::all();
        $status = Status::find('id');
        $urunan = Irnw::all();
        return view(
            'admin.urunan.create',
            compact(
                'title',
                'krama',
                'status',
                'urunan'
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
        $krama = Krama::all();
        if (Carbon::now()->isoFormat('Y') + 1) {
            foreach ($krama as $item) {
                $urunan = new Irnw();
                $urunan->nik_krama = $item->nik;
                $urunan->status_krama = $item->stts;
                $urunan->jenis = "urunan";
                $urunan->save();
            }
        }
        return redirect('Urunan')->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_irnw)
    {
        $urunan = Irnw::find($id_irnw);
        return view('admin.urunan.show', compact('urunan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Urunan";
        $status_urunan = Status::findOrFail($id);
        return view('admin.urunan.edit', compact('status_urunan', 'title'));
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
        // return $request->file('bukti_pembayaran')->store('pembayaran-urunan');

        $status_urunan = Status::findOrFail($id);
        $status_urunan->status_krama = $request->status_krama;
        $status_urunan->urunan = $request->urunan;
        // dd($request);
        $status_urunan->save();

        return redirect('Urunan')->with('success', 'Nominal Urunan Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_irwn)
    {
        //
    }

    public function setstatus(Request $request, $id_irnw)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:Belum Bayar,Gagal,Proses,Sukses',
        ]);

        $urunan = Irnw::find($id_irnw);
        $urunan->status_pembayaran = $request->status_pembayaran;
        $urunan->save();

        return redirect('Urunan');
    }

    public function dedosanEdit($id)
    {
        $title = "Ubah Nominal Dedosan";
        $dedosan = Dedosan::find($id);
        return view('admin.urunan.dedosanEdit', compact('dedosan', 'title'));
    }

    public function dedosanUpdate(Request $request, $id)
    {
        $request->validate([
            'nominal_dedosan'   => 'required|numeric',
        ]);

        $dedosan = Dedosan::find($id);
        $dedosan->nominal_dedosan = $request->nominal_dedosan;
        $dedosan->save();

        return redirect()->route('Urunan.index')->with('success', 'Nominal Dedosan Berhasil diubah !');
    }
}
