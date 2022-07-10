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
                    <th>No KK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempekan</th>
                    <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($keluarga as $keluargas )
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$keluargas->nik}}</td>
                    <td>{{$keluargas->no_kk}}</td>
                    <td>{{$keluargas->nm}}</td>
                    <td>{{$keluargas->jenisKelamin->jenis_kelamin}}</td>
                    <td>{{$keluargas->statusKeluarga->status_dalam_keluarga}}</td>
                    <!-- <td class="text-center">
                        <a href="{{ route('krama.show', $keluargas->id) }}" class="btn btn-primary btn-sm">Diri</a>
                        <a href="{{ route('krama.detail-krama', $keluargas->id) }}" class="btn btn-info btn-sm">Keluarga</a>
                    </td> -->
                    <td class="text-center">
                        <div class=" d-flex d-inline-flex">
                            <a href="{{route('keluarga.edit', $keluargas->id)}}" class="btn btn-primary mr-2">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <!-- <form action="{{ route('keluarga.destroy', $keluargas->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                            <, $keluarga->id/button>
                            </form> -->
                        </div>
                    </td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
            <a href="{{ route('keluarga.detail', $klrg->id) }}" class="btn btn-info btn-sm ml-2"> Detail Keluarga</a>
        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            {{ $keluarga->links() }}
        </nav>
    </div>
</div>
@endsection