@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    <div class="table-responsive">
        <form action="{{ route('absensi.store') }}" method="post">
            <div class="d-flex justify-content-between mb-3">
                <div class="d-flex">
                    <h6>{{$kegiatan->nm_kgtn}}</h6>
                </div>
                <div class="d-flex">
                    <h6>Tanggal Kegiatan : {{$tgl_kegiatan}}</h6>
                </div>
            </div>
            <table class="table table-bordered">
                @csrf
                <input type="text" name="kegiatan_id" value="{{ $kegiatan->id_kegiatan }}" hidden>
                <?php $no = 1; ?>
                @if (Auth::guard('prajuru')->user()->level == "prajuru")
                <tr class="thead-light text-center">
                    <th>#</th>
                    <th>H</th>
                    <th>I</th>
                    <th>A</th>
                    <th>Nama</th>
                    <th>Tempekan</th>
                </tr>
                @foreach ($krama_desa as $item)
                <tr>
                    <td>{{$no;}}</td>
                    <td class="text-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="kehadiran[]<?php echo $no; ?>" id="hadir{{$item->id}}" value="hadir">
                            <label class="custom-control-label" for="hadir{{$item->id}}"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="kehadiran[]<?php echo $no; ?>" id="izin{{$item->id}}" value="izin">
                            <label class="custom-control-label" for="izin{{$item->id}}"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="kehadiran[]<?php echo $no; ?>" id="alpa{{$item->id}}" value="alpa">
                            <label class="custom-control-label" for="alpa{{$item->id}}"></label>
                        </div>
                    </td>
                    <td>
                        <input type="text" name='krama_id[]' id="krama_id" value="{{ $item->id }}" hidden>
                        {{$item->nm}}
                    </td>
                    <td>
                        {{$item->tempekan->nama_tempekan}}
                    </td>
                    <input type="text" name="id_kegiatan[]" value="{{ $kegiatan->id_kegiatan }}" hidden>
                    <input type="date" name="tgl_absen[]" value="{{ $kegiatan->tgl }}" hidden>
                </tr>
                <?php $no++; ?>
                @endforeach

                @elseif (Auth::guard('prajuru')->user()->level == "kelian_tempekan")

                <tr class="thead-light text-center">
                    <th>#</th>
                    <th>H</th>
                    <th>I</th>
                    <th>A</th>
                    <th>Nama</th>
                </tr>
                @foreach ($krama as $item)
                <tr>
                    <td>{{$no;}}</td>
                    <td class="text-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="kehadiran[]<?php echo $no; ?>" id="hadir{{$item->id}}" value="hadir">
                            <label class="custom-control-label" for="hadir{{$item->id}}"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="kehadiran[]<?php echo $no; ?>" id="izin{{$item->id}}" value="izin">
                            <label class="custom-control-label" for="izin{{$item->id}}"></label>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="kehadiran[]<?php echo $no; ?>" id="alpa{{$item->id}}" value="alpa">
                            <label class="custom-control-label" for="alpa{{$item->id}}"></label>
                        </div>
                    </td>
                    <td>
                        <input type="text" name='krama_id[]' id="krama_id" value="{{ $item->id }}" hidden>
                        {{$item->nm}}
                    </td>
                    <input type="text" name="id_kegiatan[]" value="{{ $kegiatan->id_kegiatan }}" hidden>
                    <input type="date" name="tgl_absen[]" value="{{ $kegiatan->tgl }}" hidden>
                </tr>
                <?php $no++; ?>
                @endforeach

                @endif
            </table>
            <div class="d-flex flex-row-reverse mr-5">
                <button type="submit" class="btn btn-primary p-2">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection