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
                    <th>Nama Ketua Dadya</th>
                    <th>Nama Dadya</th>
                    <th>Alamat</th>
                    <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></i></th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($ddy as $dadya)
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$dadya->nm_kt}}</td>
                    <td>{{$dadya->ddys->nm_ktd}}</td>
                    <td>{{$dadya->banjarAdat->nama_banjar_adat}}</td>
                    <td class="text-center">
                        <a href="{{route('Dadya.edit', $dadya->id_ddy)}}" class="btn btn-info">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            {{ $ddy->links() }}
        </nav>
    </div>
</div>
@endsection