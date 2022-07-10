@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class=" table-responsive">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $prajuru->foto) }}" class="img-preview border border-primary mb-3 rounded-circle @error('foto') is-invalid @enderror" width="150" height="150">
            </div>
            <table class="table table-striped table-bordered table-hover">
                <tbody>
                    <tr>
                        <td>Nama Prajuru</td>
                        <td>{{ $prajuru->nama_pegawai }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $prajuru->jenisKelamin->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>{{ $prajuru->jabatanPrajuru->jabatan_prajuru }}</td>
                    </tr>
                    <tr>
                        <td>Banjar Adat</td>
                        <td>{{ $prajuru->banjarAdat->nama_banjar_adat }}</td>
                    </tr>
                    <tr>
                        <td>Tempekan</td>
                        <td>{{ $prajuru->tempekan->nama_tempekan }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection