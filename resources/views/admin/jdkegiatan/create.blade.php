@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>

@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('JadwalKegiatan.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="nm_kgtn" class="font-weight-normal">Rencana Kegiatan</label>
                <input type="text" name='nm_kgtn' id="nm_kgtn" class="form-control @error('nm_kgtn') is-invalid @enderror" placeholder="Rencana Kegiatan...">
                @error('nm_kgtn')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="interval">Interval</label>
                <input type="text" name='interval' id="interval" class="form-control @error('interval') is-invalid @enderror" placeholder="Interval...">
                @error('interval')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="tmpt">Tempat</label>
                <input type="text" name='tmpt' id="tmpt" class="form-control @error('tmpt') is-invalid @enderror" placeholder="Tempat...">
                @error('tmpt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="tgl">Tanggal</label>
                <input type="date" name='tgl' id="tgl" class="form-control @error('tgl') is-invalid @enderror" placeholder="Tanggal...">
                @error('tgl')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="peserta">Peserta</label>
                <input type="text" name='peserta' id="peserta" class="form-control @error('peserta  ') is-invalid @enderror" placeholder="Peserta...">
                @error('peserta')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="jam">Jam</label>
                <input type="text" name='jam' id="jam" class="form-control @error('jam') is-invalid @enderror" placeholder="Jam...">
                @error('jam')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-sm-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection