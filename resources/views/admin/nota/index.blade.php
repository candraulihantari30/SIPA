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
        <div class="container">
            <div class="sidebar-brand d-flex d-inline-flex mt-3">
                <img src="{{asset('assets/image/LogoD .png')}}" alt="logo" width="70px" height="70px" class="mr-2">
                <div class="pt-3">
                    <h5 class="text-center">DESA ADAT TEMUKUS, KEC. BANJAR, KAB. BULELENG</h5>
                    <h6 class="text-center">Jl. Singaraja-Seririt KM.17, Telp: +6285903714007 | Email: temukusdesaadat@gmail.com</h6>
                </div>
            </div>
            <hr style="
            border-width: 3px;
            border-color:black;
            margin-left: 0px;
            margin-right: 0px;
            ">
        </div>
        <div class="card-body">
            <h6 class="text-center mb-5"> KWITANSI PEMBAYARAN </h6>

            <div class="ml-5 mr-5">
                <table border="0" class="d-flex justify-content-end mb-5">
                    <tr>
                        <td>
                            <h6>Nomor Kwitansi &nbsp;</h6>
                        </td>
                        <td width="100px">
                            <input type="text" class="form-control w-100" value="{{ $transaksi->no_kwitansi }}" disabled>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-6">
                        <table border="0" width="100%" class="mb-3">
                            <tr>
                                <td>
                                    <h6>NIK</h6>
                                </td>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td>
                                    <h6>{{ $transaksi->dataKrama->nik }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Nama</h6>
                                </td>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td>
                                    <h6>{{ $transaksi->dataKrama->nm }}</h6>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Status</h6>
                                </td>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td>
                                    <h6>{{ $transaksi->dataKrama->status->status_krama }}</h6>
                                </td>
                                <td></td>

                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table border="0" width="100%">
                            <tr>
                                <td>
                                    <h6>Banjar</h6>
                                </td>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td>
                                    <h6>{{ $transaksi->dataKrama->banjarAdat->nama_banjar_adat }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Tempekan</h6>
                                </td>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td>
                                    <h6>{{ $transaksi->dataKrama->tempekan->nama_tempekan }}</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h6>Tanggal Transaksi</h6>
                                </td>
                                <td>
                                    <h6>:</h6>
                                </td>
                                <td>
                                    <h6>
                                        {{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->isoFormat('dddd, D MMMM Y') }}
                                    </h6>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- <h6>Keterangan :  </h6> -->
                <table border="1" cellpadding="10" width="100%">
                    <tr>
                        <th>Jenis Pembayaran</th>
                        <th>Periode</th>
                        <th>Nominal</th>
                    </tr>
                    <tr>
                        @if ($detail_urunan)
                        <td>
                            Urunan
                        </td>
                        <td> {{ $detail_urunan->periode }} </td>
                        <td> {{ rupiah($detail_urunan->nominal) }} </td>
                        @endif
                    </tr>
                    <tr>
                        @if ($detail_denda)
                        <td>
                            Denda
                        </td>
                        <td> {{ $detail_denda->periode }} </td>
                        <td> {{ rupiah($detail_denda->nominal) }} </td>
                        @endif
                    </tr>
                    <tr>
                        <th class="text-center" colspan="2">Total</th>
                        <td>{{ rupiah($transaksi->total) }}</td>
                    </tr>
                </table>
                <div class="text-right mt-3">
                    <h6 class="p-2">Penerima</h6>
                    <br><br>
                    <h6 class="p-2">{{ $transaksi->dataPrajuru->nama_pegawai }}</h6>
                </div>
            </div>

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