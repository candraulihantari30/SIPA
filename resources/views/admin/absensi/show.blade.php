@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table width="40%">
                <tr>
                    <th>Nama Kegiatan</th>
                    <td>:</td>
                    <td>{{ $absen->dataKegiatan->nm_kgtn }}</td>
                </tr>
                <tr>
                    <th>Waktu</th>
                    <td>:</td>
                    <td>{{ $absen->dataKegiatan->jam }}</td>
                </tr>
                <tr>
                    <th>Tanggal Kegiatan</th>
                    <td>:</td>
                    <td>{{ \Carbon\Carbon::parse($absen->dataKegiatan->tgl)->isoFormat('dddd, D MMMM Y') }}</td>
                </tr>
            </table>
        </div>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <tr class="thead-light text-center">
                    <th>Nama</th>
                    <th>Kehadiran</th>
                </tr>
                @foreach ($krama as $item )
                <tr>
                    <td>{{$item->dataKrama->nm}}</td>
                    <td>{{$item->kehadiran}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection