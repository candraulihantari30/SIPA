@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>

@endsection

@section('content')
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr class="thead-light text-center">
                    <th>#</th>
                    <th>Nama</th>
                    <th>Banjar</th>
                    <th>Tempekan</th>
                    <th>Tanggal</th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($absensi_tempekan as $absensis )
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$absensis->dataKrama->nm}}</td>
                    <td>{{$absensis->dataKrama->banjarAdat->nama_banjar_adat}}</td>
                    <td>{{$absensis->dataKrama->tempekan->nama_tempekan}}</td>
                    <td>{{$absensis->dataKegiatan->tgl}}</td>
                    <!-- <td>{{$absensis->keterangan}}</td> -->
                    <td class="text-center">
                    </td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection