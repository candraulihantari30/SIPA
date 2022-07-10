<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Irnw;
use App\Models\Krama;
use App\Models\RekapAbsen;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    public function index()
    {
        $title = "Pembayaran";
        // $urunan = Krama::join('irnws', 'kramas.id', '=', 'irnws.nik_krama')->where('jenis', 'like', "%" . 'urunan' . "%")->get();
        $nominal_urunan = Krama::join('irnws', 'kramas.id', '=', 'irnws.nik_krama');
        $nominal_denda = Krama::join('rekap_absens', 'kramas.id', '=', 'rekap_absens.krama_id');
        $urunan = Krama::join('irnws', 'kramas.id', '=', 'irnws.nik_krama');
        $denda = Krama::join('rekap_absens', 'kramas.id', '=', 'rekap_absens.krama_id');

        if (request('cari_nik') || request('cari_jenis') || request('cari_periode')) {
            // dd(request('cari_nik'));
            $nominal_urunan->where('stts_dlm_klrg', '=', '1')->where('status_pembayaran', '!=', 'lunas')
                ->where('nik', 'like', '%' . request('cari_nik') . '%')
                ->where('jenis', 'like', '%' . request('cari_jenis') . '%')
                ->where('periode', 'like', '%' . request('cari_periode') . '%');
            $nominal_denda->where('stts_dlm_klrg', '=', '1')->where('status_pembayaran', '!=', 'lunas')
                ->where('nik', 'like', '%' . request('cari_nik') . '%')
                ->where('jenis', 'like', '%' . request('cari_jenis') . '%')
                ->where('periode', 'like', '%' . request('cari_periode') . '%');
            $urunan->where('stts_dlm_klrg', '=', '1')->where('status_pembayaran', '!=', 'lunas')
                ->where('nik', 'like', '%' . request('cari_nik') . '%')
                ->where('jenis', 'like', '%' . request('cari_jenis') . '%')
                ->where('periode', 'like', '%' . request('cari_periode') . '%');
            $denda->where('stts_dlm_klrg', '=', '1')->where('status_pembayaran', '!=', 'lunas')
                ->where('nik', 'like', '%' . request('cari_nik') . '%')
                ->where('jenis', 'like', '%' . request('cari_jenis') . '%')
                ->where('periode', 'like', '%' . request('cari_periode') . '%');
        }
        return view(
            'admin.transaksi.index',
            compact(
                'title'
            ),
            [
                "nominal_urunan" => $nominal_urunan->first(),
                "nominal_denda" => $nominal_denda->first(),
                "urunan" => $urunan->get(),
                "denda" => $denda->get()
            ]
        );
    }
    public function store(Request $request)
    {
        $transaksi = transaksi::latest()->first() ?? new transaksi();
        $kode_kwitansi = (int) $transaksi->no_kwitansi + 1;

        $request->validate([
            'tgl_transaksi' => 'required'
        ]);

        $transaksi = new transaksi();
        $transaksi->no_kwitansi = tambah_nol_didepan($kode_kwitansi, 5);
        $transaksi->total = $request->nominal_urunan + $request->nominal_denda;
        $transaksi->id_user = $request->id_user;
        $transaksi->id_prajuru = $request->id_prajuru;
        $transaksi->tgl_transaksi = $request->tgl_transaksi;
        // dd($transaksi);
        $transaksi->save();

        if ($request->jenis == 'urunan' && $request->djenis == 'denda') {
            $detail_transaksi = new Detail();
            $detail_transaksi->transaksi_id = $transaksi->id;
            $detail_transaksi->jenis = $request->jenis;
            $detail_transaksi->periode = $request->periode;
            $detail_transaksi->nominal = $request->nominal_urunan;
            // dd($detail_transaksi);
            $detail_transaksi->save();

            $detail_transaksi = new Detail();
            $detail_transaksi->transaksi_id = $transaksi->id;
            $detail_transaksi->jenis = $request->djenis;
            $detail_transaksi->periode = $request->dperiode;
            $detail_transaksi->nominal = $request->nominal_denda;
            // dd($detail_transaksi);
            $detail_transaksi->save();

            $urunan = Irnw::where('nik_krama', $request->id_user)->first();
            $urunan->status_pembayaran = "lunas";
            $urunan->save();

            $denda = RekapAbsen::where('krama_id', $request->id_user)->first();
            $denda->status_pembayaran = "lunas";
            $denda->save();
        } elseif ($request->jenis == 'urunan') {
            $detail_transaksi = new Detail();
            $detail_transaksi->transaksi_id = $transaksi->id;
            $detail_transaksi->jenis = $request->jenis;
            $detail_transaksi->periode = $request->periode;
            $detail_transaksi->nominal = $request->nominal_urunan;
            // dd($detail_transaksi);
            $detail_transaksi->save();

            $urunan = Irnw::where('nik_krama', $request->id_user)->first();
            $urunan->status_pembayaran = "lunas";
            $urunan->save();
        } elseif ($request->djenis == 'denda') {
            $detail_transaksi = new Detail();
            $detail_transaksi->transaksi_id = $transaksi->id;
            $detail_transaksi->jenis = $request->djenis;
            $detail_transaksi->periode = $request->dperiode;
            $detail_transaksi->nominal = $request->nominal_denda;
            // dd($detail_transaksi);
            $detail_transaksi->save();

            $denda = RekapAbsen::where('krama_id', $request->id_user)->first();
            $denda->status_pembayaran = "lunas";
            $denda->save();
        }

        return redirect('transaksi')->with('success', 'Pembayaran Sukses');
    }
    public function transaksi()
    {
        $title = "Transaksi";
        $transaksi = transaksi::with('dataKrama', 'dataPrajuru')->latest()->get();
        return view('admin.transaksi.transaksi', compact('title', 'transaksi'));
    }

    public function detail_transaksi($id)
    {
        $transaksi = transaksi::with('dataKrama', 'dataPrajuru')->find($id);
        $detail = Detail::join('transaksis', 'transaksis.id', '=', 'details.transaksi_id')->where('transaksi_id', $id)->get();
        return view('admin.transaksi.detail', compact('transaksi', 'detail'));
    }

    public function kwitansi($id)
    {
        $transaksi = transaksi::with('dataKrama', 'dataPrajuru')->find($id);
        $detail_urunan = Detail::join('transaksis', 'transaksis.id', '=', 'details.transaksi_id')->where('transaksi_id', $id)->where('jenis', 'urunan')->first();
        $detail_denda = Detail::join('transaksis', 'transaksis.id', '=', 'details.transaksi_id')->where('transaksi_id', $id)->where('jenis', 'denda')->first();
        return view('admin.nota.index', compact('transaksi', 'detail_urunan', 'detail_denda'));
    }
}
