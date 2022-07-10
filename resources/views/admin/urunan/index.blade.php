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
                    <!-- <th>NIK</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Jumalah Urunan</th>
                    <th>Periode</th> -->
                    <th>Status Krama</th>
                    <th>Nominal Urunan</th>
                    <th>Aksi</th>

                </tr>
                <?php $no = 1; ?>
                @foreach ($status_urunan as $item)
                <tr>
                    <td class="text-center">{{$no}}</td>
                    <td>{{ $item->status_krama }}</td>
                    <td>{{ rupiah($item->urunan) }}</td>

                    <td class="text-center">
                        <div class="d-flex d-inline-flex">
                            <a href="{{ route('Urunan.edit', $item->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="fa fa-pen"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php $no++; ?>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection
<!-- @push('javascript')
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
@endpush -->