@extends('layouts.main')
@section('header')
<h1>{{ $title }}</h1>

@endsection

@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class="container">
            <form action="{{ route('rekap.store') }}" method="POST">
                @csrf
                <div class="table-responsive mt-2">
                    <table class="table table-bordered">
                        <tr class="thead-light text-center">
                            <th>#</th>
                            <th>Nama</th>
                            <th>Banjar</th>
                            <th>Tempekan</th>
                            <th>H</th>
                            <th>I</th>
                            <th>A</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $no = 1; ?>
                        @foreach ($rekap as $rekapAbsen)
                        <tr>
                            <td class="text-center">{{$no}}</td>
                            <td>
                                {{$rekapAbsen->nm}}
                                <input type="text" name="krama_id[]" value="{{$rekapAbsen->id}}" hidden>
                            </td>
                            <td>{{$rekapAbsen->banjarAdat->nama_banjar_adat}}</td>
                            <td>{{$rekapAbsen->tempekan->nama_tempekan}}</td>
                            <td class="text-center">
                                {{$rekapAbsen->hadir}}
                                <input type="text" name="hadir[]" value="{{$rekapAbsen->hadir}}" hidden>
                            </td>
                            <td class="text-center">
                                {{$rekapAbsen->izin}}
                                <input type="text" name="izin[]" value="{{$rekapAbsen->izin}}" hidden>
                            </td>
                            <td class="text-center">
                                {{$rekapAbsen->alpa}}
                                <input type="text" name="tidak_hadir[]" value="{{$rekapAbsen->alpa}}" hidden>
                            </td>
                            <td>
                                <a href="{{ route('detail.rekap.krama', $rekapAbsen->id) }}" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection