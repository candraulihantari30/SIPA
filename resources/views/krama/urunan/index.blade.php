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
                    <th>NIK</th>
                    <th>nama</th>
                    <th>Status</th>
                    <th>Jumalah Urunan</th>
                    <th>Periode</th>
                    <th>Verifikasi</th>
                    <th>Aksi</th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($urunan_krama as $urunans)
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$urunans->krama->nik}}</td>
                    <td>{{$urunans->krama->nm}}</td>
                    <td>{{$urunans->status->status_krama}}</td>
                    <td>Rp {{$urunans->jumlah_iuran}}</td>
                    <td class="text-center">
                        {{$urunans->periode}}
                    </td>
                    <td class="text-center">
                        <div class="d-flex d-inline-flex">
                            <a href="#" class="btn btn-danger btn-sm">{{$urunans->status_pembayaran}}</a>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class=" d-flex d-inline-flex">
                            <a href="{{route('iuran.edit', $urunans->id_irnw)}}" class="btn btn-success m-2">Bayar</a>
                            <a href="{{ route('nota.urunan') }}" target="_blank" class="btn btn-primary m-2">Nota</a>
                        </div>
                    </td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
        </nav>
    </div>
</div>
@endsection