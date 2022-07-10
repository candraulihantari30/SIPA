@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class=" table-responsive">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $krama_desa->ft) }}" class="img-preview border border-primary mb-3 rounded-circle @error('ft') is-invalid @enderror" width="150" height="150">
            </div>
            <table class="table table-striped table-bordered table-hover">
                <tbody>
                    <tr>
                        <td>Nomor Induk Kependudukan</td>
                        <td>{{ $krama_desa->nik }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Kartu Keluarga</td>
                        <td>{{ $krama_desa->no_kk }}</td>
                    </tr>
                    <tr>
                        <td>Nama Krama</td>
                        <td>{{ $krama_desa->nm }}</td>
                    </tr>
                    <tr>
                        <td>Tempat & Tanggal Lahir</td>
                        <td>{{ $krama_desa->tmpt }}, {{ $today }}</td>
                    </tr>
                    <tr>
                        <td>Status dalam Keluarga</td>
                        <td>{{ $krama_desa->statusKeluarga->status_dalam_keluarga }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>{{ $krama_desa->jabatan->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Banjar Adat</td>
                        <td>{{ $krama_desa->banjarAdat->nama_banjar_adat }}</td>
                    </tr>
                    <tr>
                        <td>Tempekan</td>
                        <td>{{ $krama_desa->tempekan->nama_tempekan }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $krama_desa->status->status_krama }}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>{{ $krama_desa->jenispendidikan->nama_pendidikan }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>{{ $krama_desa->jenispekerjaan->nama_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $krama_desa->jenisKelamin->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ $krama_desa->keterangan->nama_keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Dadya</td>
                        <td>{{ $krama_desa->nm_ddy }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ketua Dadya</td>
                        <td>{{ $krama_desa->nm_kt_ddy }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection