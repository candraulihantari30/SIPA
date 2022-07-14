@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body p-4">
        <div class=" table-responsive">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('storage/' . $keluarga->ft) }}" class="img-preview border border-primary mb-3 rounded-circle @error('ft') is-invalid @enderror" width="150" height="150">
            </div>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                </thead>
                <tbody>
                    <tr>
                        <td>Nomor Induk Kependudukan</td>
                        <td>{{ $keluarga->nik }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Kartu Keluarga</td>
                        <td>{{ $keluarga->no_kk }}</td>
                    </tr>
                    <tr>
                        <td>Nama Krama</td>
                        <td>{{ $keluarga->nm }}</td>
                    </tr>
                    <tr>
                        <td>Tempat & Tanggal Lahir</td>
                        <td>{{ $keluarga->tmpt }}, {{ $today }}</td>
                    </tr>
                    <tr>
                        <td>Status dalam Keluarga</td>
                        <td>{{ $keluarga->statusKeluarga->status_dalam_keluarga }}</td>
                    </tr>
                    <tr>
                        <td>Jabatan</td>
                        <td>{{ $keluarga->jabatan->jabatan }}</td>
                    </tr>
                    <tr>
                        <td>Banjar Adat</td>
                        <td>{{ $keluarga->banjarAdat->nama_banjar_adat }}</td>
                    </tr>
                    <tr>
                        <td>Tempekan</td>
                        <td>{{ $keluarga->tempekan->nama_tempekan }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $keluarga->status->status_krama }}</td>
                    </tr>
                    <tr>
                        <td>Pendidikan</td>
                        <td>{{ $keluarga->jenispendidikan->nama_pendidikan }}</td>
                    </tr>
                    <tr>
                        <td>Pekerjaan</td>
                        <td>{{ $keluarga->jenispekerjaan->nama_pekerjaan }}</td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{ $keluarga->jenisKelamin->jenisKelamin }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>{{ $keluarga->keterangan->nama_keterangan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Dadya</td>
                        <td>{{ $keluarga->nmddy->nm_ddy }}</td>
                    </tr>
                    <tr>
                        <td>Nama Ketua Dadya</td>
                        <td>{{ $keluarga->ketuaDadya->nm_ktd }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h3 class="">Data Keluarga</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr class="thead-light text-center">
                        <th>#</th>
                        <th>NIK</th>
                        <th>No KK</th>
                        <th>Nama</th>
                        <th>Status dalam Keluarga</th>
                        <th>Tempat, Tanggal Lahir</th>
                        <th>Pekerjaan</th>
                        <th>Pendidikan</th>
                        <th>Keterangan</th>
                    </tr>
                    <?php $no = 1; ?>
                    @foreach ($keluargaDetail as $item )
                    <tr>
                        <td class="text-center">{{$no}}</td>
                        <td>{{$item->nik}}</td>
                        <td>{{$item->no_kk}}</td>
                        <td>{{$item->nm}}</td>
                        <td>{{$item->statusKeluarga->status_dalam_keluarga}}</td>
                        <td>{{$item->tmpt}}, {{\Carbon\Carbon::parse($item->tgl)->isoFormat('D MMMM Y')}}</td>
                        <td>{{$item->banjarAdat->nama_banjar_adat}}</td>
                        <td>{{$item->tempekan->nama_tempekan}}</td>
                        <td>{{$item->keterangan->nama_keterangan}}</td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection