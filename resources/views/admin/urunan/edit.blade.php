@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('Urunan.update', $status_urunan->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col">
                <label for="status_krama">Status Krama</label>
                <input type="text" name='status_krama' id="status_krama" class="form-control @error('status_krama') is-invalid @enderror" value="{{ old('status_krama', $status_urunan->status_krama) }}" placeholder="Status Urunan">
                @error('status_krama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col">
                <label for="urunan">Nominal Urunan</label>
                <input type="number" name='urunan' id="urunan" class="form-control @error('urunan') is-invalid @enderror" value="{{ old('urunan', $status_urunan->urunan) }}" placeholder="Status Urunan">
                @error('urunan')
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