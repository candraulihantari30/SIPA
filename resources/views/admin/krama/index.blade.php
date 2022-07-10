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
                    <th>Banjar Adat</th>
                    <th>Tempekan</th>
                    <th>Detail</th>
                    <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($krama_desa as $kramas )
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$kramas->nik}}</td>
                    <td>{{$kramas->no_kk}}</td>
                    <td>{{$kramas->nm}}</td>
                    <td>{{$kramas->banjarAdat->nama_banjar_adat}}</td>
                    <td>{{$kramas->tempekan->nama_tempekan}}</td>
                    <td class="text-center">
                        <div class="d-flex d-inline-flex">
                            <a href="{{ route('krama.show', $kramas->id) }}" class="btn btn-info btn-sm mr-2">Diri</a>
                            <a href="{{ route('krama.detail-krama', $kramas->id) }}" class="btn btn-primary btn-sm">Keluarga</a>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex d-inline-flex">
                            <a href="{{route('krama.edit', $kramas->id)}}" class="btn btn-info btn-sm mr-2">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('krama.destroy', $kramas->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
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
            {{ $krama_desa->links() }}
        </nav>
    </div>
</div>
@endsection