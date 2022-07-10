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
                    <th>No</th>
                    <th>Kwitansi</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Penerima</th>
                    <th>Aksi <i class="fa fa-exchange-alt" aria-hidden="true"></i></th>
                </tr>
                <?php $no = 1; ?>
                @foreach ($transaksi as $item)
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{$item->no_kwitansi}}</td>
                    <td>{{$item->dataKrama->nik}}</td>
                    <td>{{$item->dataKrama->nm}}</td>
                    <td>{{$item->dataPrajuru->nama_pegawai}}</td>
                    <td class="text-center">
                        <div class="d-flex d-inline-flex">
                            <span data-toggle="tooltip" data-placement="top" title="Detail Transaksi" class="mr-2">
                                <a href="#mymodal" data-remote="{{ route('data_transaksi.detail', $item->id) }}" data-toggle="modal" data-target="#mymodal" data-title="Detail Transaksi" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </span>
                            <a href="{{ route('kwitansi', $item->id) }}" target="_blank" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Nota">
                                <i class="fa fa-file"></i>
                            </a>
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
        </nav>
    </div>
</div>
@endsection

@push('javascript')
<script>
    jQuery(document).ready(function($) {
        $('#mymodal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
    $('#mymodal').appendTo("body").modal('show');
</script>

<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>


@endpush