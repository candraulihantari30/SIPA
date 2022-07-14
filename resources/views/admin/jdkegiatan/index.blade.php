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
                    <th>Rencana Kegiatan</th>
                    <th>Tempat</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Interval</th>
                    <th>Peserta</th>
                    <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></i></th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($jdl as $kgt)
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$kgt->nm_kgtn}}</td>
                    <td>{{$kgt->tmpt}}</td>
                    <td>{{ \Carbon\Carbon::parse($kgt->tgl)->isoFormat('D MMMM Y')}}</td>
                    <td>{{$kgt->jam}}</td>
                    <td>{{$kgt->interval}}</td>
                    <td>{{$kgt->peserta}}</td>
                    <td class="text-center">
                        <div class="d-flex d-inline-flex">
                            @if (Auth::guard('prajuru')->user()->level == "prajuru")
                            <a href="{{route('JadwalKegiatan.edit', $kgt->id_kegiatan)}}" class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top" title="Edit Kegiatan">
                                <i class="fa fa-pen" aria-hidden="true"></i>
                            </a>
                            <a href="{{route('absensi.show', $kgt->id_kegiatan)}}" class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top" title="Detail Absen">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="{{route('absen.create', $kgt->id_kegiatan)}}" class="btn btn-warning mr-2" data-toggle="tooltip" data-placement="top" title="Absen">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                            <form action="{{ route('JadwalKegiatan.destroy', $kgt->id_kegiatan) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                            @elseif (Auth::guard('prajuru')->user()->level == "kelian_tempekan")
                            <a href="{{route('absensi.show', $kgt->id_kegiatan)}}" class="btn btn-info mr-2" data-toggle="tooltip" data-placement="top" title="Detail Absen">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="{{route('absen.create', $kgt->id_kegiatan)}}" class="btn btn-warning mr-2" data-toggle="tooltip" data-placement="top" title="Absen">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                            </a>
                            @endif
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
            {{ $jdl->links() }}
        </nav>
    </div>
</div>
@endsection