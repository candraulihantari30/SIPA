@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body p-3">
                <form action="{{ route('pembayaran') }}">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" name="cari_nik" id="nik" class="form-control" placeholder="Cari NIK" value="{{ request('cari_nik') }}">
                    </div>
                    <div class="form-group">
                        <label for="cari_jenis">Jenis Pembayaran</label>
                        <select class="custom-select" name="cari_jenis" id="cari_jenis">
                            <option value="" {{ request('cari_jenis') == '' ? 'selected' : null }}>Urunan & Denda</option>
                            <option value="urunan" {{ request('cari_jenis') == 'urunan' ? 'selected' : null }}>Urunan</option>
                            <option value="denda" {{ request('cari_jenis') == 'denda' ? 'selected' : null }}>Denda</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="periode">Periode</label>
                        <input type="text" name="cari_periode" id="periode" class="form-control" placeholder="Cari Periode" value="{{ request('cari_periode') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <form action="{{ route('transaksi') }}" method="post" onsubmit="return confirm('Yakin ingin membayar sekarang ?')">
                        <table class="d-flex m-3 justify-content-end">
                            <tr>
                                <td>
                                    <label for="tgl">Tanggal Transaksi</label>
                                </td>
                                <td class="col-1">
                                    <label>:</label>
                                </td>
                                <td class="col-2">
                                    <input type="date" class="form-control" name="tgl_transaksi" id="tgl" aria-describedby="emailHelp">
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr class="thead-light text-center">
                                <th>#</th>
                                <th>NIK</th>
                                <th>Jenis</th>
                                <th>Periode</th>
                                <th>Nominal</th>
                            </tr>
                            <?php $no = 1; ?>

                            @if (request('cari_nik') || request('cari_jenis') || request('cari_periode'))
                            @csrf
                            <input type="text" name="id_prajuru" value="{{Auth::guard('prajuru')->user()->id}}" hidden>
                            @foreach ($urunan as $item)
                            <input type="text" name="id_user" value="{{ $item->id }}" hidden>
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td>{{$item->nik}}</td>
                                <td>
                                    {{$item->jenis}}
                                    <input type="text" name="jenis" value="{{$item->jenis}}" hidden>
                                </td>
                                <td>
                                    {{$item->periode}}
                                    <input type="text" name="periode" value="{{$item->periode}}" hidden>
                                </td>
                                <td>{{rupiah($item->status->urunan)}}</td>
                                <input type="number" name="nominal_urunan" value="{{ $item->status->urunan }}" hidden>
                            </tr>
                            @endforeach
                            @foreach ($denda as $item)
                            <input type="text" name="id_user" value="{{ $item->id }}" hidden>
                            <tr>
                                <td class="text-center">{{$no++}}</td>
                                <td>
                                    {{$item->nik}}
                                </td>
                                <td>
                                    {{$item->jenis}}
                                    <input type="text" name="djenis" value="{{$item->jenis}}" hidden>
                                </td>
                                <td>
                                    {{$item->periode}}
                                    <input type="text" name="dperiode" value="{{$item->periode}}" hidden>
                                </td>
                                <td>{{rupiah($item->nominal)}}</td>
                                <input type="number" name="nominal_denda" value="{{ $item->nominal }}" hidden>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-center">TOTAL</td>
                                <!-- Urunan -->
                                @if (request('cari_jenis') == "urunan")

                                @if ($nominal_urunan == null)
                                @elseif ($nominal_urunan)
                                <td>{{ rupiah($nominal_urunan->status->urunan)}}</td>
                                @endif

                                <!-- Denda -->
                                @elseif (request('cari_jenis') == "denda")

                                @if ($nominal_denda == null)
                                @elseif ($nominal_denda)
                                <td>{{ rupiah($nominal_denda->nominal)}}</td>
                                @endif
                                <!-- Urunan dan Denda -->
                                @elseif (request('cari_jenis') == "")

                                @if ($nominal_urunan == null && $nominal_denda == null)
                                @elseif ($nominal_denda == null)
                                <td>{{ rupiah($nominal_urunan->status->urunan + 0)}}</td>
                                @elseif ($nominal_urunan == null && $nominal_denda == null)
                                <td>{{ rupiah(0 + $nominal_denda->nominal)}}</td>

                                @elseif ($nominal_urunan && $nominal_denda)
                                <td>{{ rupiah($nominal_urunan->status->urunan + $nominal_denda->nominal)}}</td>
                                @endif

                                @endif
                            </tr>
                            @endif
                        </table>
                        @if (request('cari_nik') || request('cari_jenis') || request('cari_periode'))
                        <button type="submit" class="btn btn-success m-3 konfirmasi" id="konfirmasi">Bayar</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#konfirmasi').submit(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    });
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        }
    })
</script>
@endsection