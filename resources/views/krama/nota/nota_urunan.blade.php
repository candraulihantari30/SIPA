<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    @include('layouts.style')
</head>

<body>
    <div class="card border-4 card flex-fill align-content-lg-center" style="max-width: 60rem;">
        <div class="card-header border-2">
            <div class="sidebar-brand">
                <div class="d-flex align-items-center pt-3 pb-3">
                    <img src="{{asset('assets/image/LogoD .png')}}" alt="logo" width="70px" class="mr-2">
                    <div>
                        <h5 class="text-left">DESA ADAT TEMUKUS, KEC. BANJAR, KAB. BULELENG</h5>
                        <h6 class="mt-1">Jl. Singaraja-Seririt KM.17, Telp: +6285903714007 | Email: temukusdesaadat@gmail.com</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class=" card-body text-center">
            <h6 class=""> BUKTI PEMBAYARAN </h6>
        </div>
        <div class="d-flex flex-row-reverse mr-5">
            <h6 class="p-2">Tanggal :</h6>
        </div>
        <div class="d-flex flex-row-reverse mr-5">
            <h6 class="p-2">Periode : {{$nota_urunan->periode}}</h6>
        </div>


        <div class="ml-5">
            <h6>Nama : {{ $nota_urunan->krama->nm }}</h6>
            <h6>Banjar : {{ $nota_urunan->krama->banjarAdat->nama_banjar_adat }}</h6>
            <h6>Tempekan : {{ $nota_urunan->krama->tempekan->nama_tempekan }}</h6>
            <h6>Status Krama : {{ $nota_urunan->status->status_krama }}</h6>
            <h6>Status Pembayaran : <span class="bg-danger text-white">{{ $nota_urunan->status_pembayaran }}</span></h6>
            <h6>Keterangan : Urunan</h6>
        </div>

        <div class="d-flex flex-row-reverse mr-5">
            <h6 class="p-2">Total : Rp {{ $nota_urunan->jumlah_iuran }}</h6>
        </div>


    </div>
























    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="../node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="{{ asset('node_modules/prismjs/prism.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/index.js') }}"></script>
</body>

</html>