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
                    <th>Nama Krama</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Kehadiran</th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($detail as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->dataKrama->nm}}</td>
                    <td>{{$item->dataKegiatan->nm_kgtn}}</td>
                    <td>{{ \Carbon\Carbon::parse($item->dataKegiatan->tgl)->isoFormat('dddd, D MMMM Y')}}</td>
                    <td>{{$item->kehadiran}}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- <div class="card-footer text-right">
        <a href="{{ route('rekap') }}" class="btn btn-danger">Kembali</a>
    </div> -->
</div>
@endsection