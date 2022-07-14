@extends('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection

@section('content')
@if (Auth::guard('krama')->user()->level == "krama")
<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr class="thead-light text-center">
                    <th width="100px">#</th>
                    <th>Status Krama</th>
                    <th>Nominal Urunan</th>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>{{ $urunan_krama->status->status_krama }}</td>
                    <td>{{ rupiah($urunan_krama->status->urunan) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@elseif (Auth::guard('prajuru')->user()->level == "prajuru")

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr class="thead-light text-center">
                    <th width="100px">#</th>
                    <th>Nominal Dedosan</th>
                    <th>Aksi</th>
                </tr>
                <?php $urut = 1; ?>
                @foreach ($dedosan as $denda)
                <tr>
                    <td class="text-center">{{ $urut }}</td>
                    <td>{{ rupiah($denda->nominal_dedosan) }}</td>
                    <td class=" text-center">
                        <a href="{{ route('dedosan.edit', $denda->id) }}" class="btn btn-info">
                            <i class="fa fa-pen"></i>
                        </a>
                    </td>
                </tr>
                <?php $urut++ ?>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endif


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