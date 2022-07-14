@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('dedosan.update', $dedosan->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="row">
            <div class="form-group col-6">
                <label for="nominal_dedosan">Nominal Dedosan</label>
                <input type="number" name='nominal_dedosan' id="nominal_dedosan" class="form-control @error('nominal_dedosan') is-invalid @enderror" value="{{ old('nominal_dedosan', $dedosan->nominal_dedosan) }}" placeholder="Nominal Dedosan">
                @error('nominal_dedosan')
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