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
                    <th>Jabatan</th>
                    <th>Banjar Adat</th>
                    <th>Tempekan</th>
                    <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($prajuru as $item )
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$item->nama_pegawai}}</td>
                    <td>{{$item->jabatanPrajuru->jabatan_prajuru}}</td>
                    <td>{{$item->banjarAdat->nama_banjar_adat}}</td>
                    <td>{{$item->tempekan->nama_tempekan}}</td>
                    <td class="text-center">
                        <a href="{{route('prajuru.edit', $item->id)}}" class="btn btn-info btn-sm">
                            <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('prajuru.show', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-info" aria-hidden="true"></i>
                        </a>
                        <!-- <form action="{{ route('prajuru.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form> -->
                    </td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
        </div>
    </div>
    <div class="card-footer text-right">
        <nav class="d-inline-block">
            {{ $prajuru->links() }}
        </nav>
    </div>
</div>
@endsection