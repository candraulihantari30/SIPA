@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="card p-5">
    <form action="{{ route('Urunan.store') }}" method="POST">
        @csrf
        <tbody>
            <tr class="thead-light text-center">
                <th>Nik</th>
                <th>Jumlah</th>
                <!-- <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></i></th> -->
            </tr>
            @foreach ($urunan as $item)
            <tr>
                <td>
                    <input type="text" name='nik_krama[]' id="nik_krama" value="{{ $item->id }}" hidden>
                    {{$item->nik}}
                </td>
                <td>
                    <input type="text" name="status_krama[]" value="{{ $status->id }}" hidden>
                    {{$item->jumlah_iuran}}
                </td>
            </tr>
            @endforeach
            <div class="d-flex flex-row-reverse mr-5">
                <button type="submit" class="btn btn-primary p-2">Simpan</button>
            </div>
        </tbody>
    </form>
</div>
@endsection