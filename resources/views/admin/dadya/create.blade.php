@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('Dadya.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col">
                <label for="nm_kt" class="font-weight-normal">Nama Ketua Dadya</label>
                <input type="text" name='nm_kt' id="nm_kt" class="form-control @error('nm_kt') is-invalid @enderror" placeholder="Nama Ketua Dadya...">
                @error('nm_kt')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="nm_ddy">Nama Dadya</label>
                    <select class="custom-select @error('ddys') is-invalid @enderror" name="nm_ddy" id="nm_ddy">
                        <option value="">---Pilih Nama Dadya---</option>
                        @foreach ( $ddys as $item )
                        <option value="{{ $item->id_ddys }}" {{ old('nm_ddy') == $item->id_ddys ? 'selected' : null }}>{{ $item->nm_ktd }}</option>
                        @endforeach
                    </select>
                    @error('nm_ddy')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="alamat">Alamat</label>
                    <select class="custom-select @error('alamat') is-invalid @enderror" name="alamat" id="alamat">
                        <option selected>---Pilih Alamat Dadya---</option>
                        @foreach ( $banjarAdat as $item )
                        <option value="{{ $item->id_banjar_adat }}">{{ $item->nama_banjar_adat }}</option>
                        @endforeach
                    </select>
                    @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-sm-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection