@extends ('layouts.main')

@section('header')
<h1>{{ $title }}</h1>
@endsection
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- <a href="{{ route('nota') }}" target="_blank" class="btn btn-primary">Nota</a> -->
        <div class="card card-statistic-2">
            <div class="card-header">
                <h4 class="text-primary">Data Krama</h4>
            </div>
            <div class="card-icon shadow-primary bg-primary fs">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Krama Desa</h4>
                </div>
                <div class="card-body">
                    {{ $krama }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
            <div class="card-header">
                <h4 class="text-primary">Pendapatan Asli </h4>
            </div>
            <div class="card-icon shadow-primary bg-primary">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Orders</h4>
                </div>
                <div class="card-body">
                    {{ rupiah($total_pendapatan) }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection