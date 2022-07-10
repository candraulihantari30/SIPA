<div class="table-responsive">
    <table class="table table-bordered border">
        <tr>
            <th>Kwitansi</th>
            <td>{{ $transaksi->no_kwitansi }}</td>
        </tr>
        <tr>
            <th>NIK</th>
            <td>{{ $transaksi->dataKrama->nik }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $transaksi->dataKrama->nm }}</td>
        </tr>
        <tr>
            <th>Banjar Adat</th>
            <td>{{ $transaksi->dataKrama->banjarAdat->nama_banjar_adat }}</td>
        </tr>
        <tr>
            <th>Tempekan</th>
            <td>{{ $transaksi->dataKrama->tempekan->nama_tempekan }}</td>
        </tr>
        <tr>
            <th>Status Krama</th>
            <td>{{$transaksi->dataKrama->status->status_krama}}</td>
        </tr>
        <tr>
            <th>Penerima Pembayaran</th>
            <td>{{ $transaksi->dataPrajuru->nama_pegawai }}</td>
        </tr>
        <tr>
            <th>Tanggal Transaksi</th>
            <td>{{ \Carbon\Carbon::parse($transaksi->tgl_transaksi)->isoFormat('D MMMM Y') }}</td>
        </tr>
        <tr>
            <table class="table table-bordered border">
                <th>Jenis Transaksi</th>
                <th>Periode</th>
                <th>nominal</th>
                @foreach ($detail as $item)
                <tr>
                    <td>{{$item->jenis}}</td>
                    <td>{{$item->periode}}</td>
                    <td>{{rupiah($item->nominal)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="text-center">TOTAL</td>
                    <td>{{rupiah($transaksi->total)}}</td>
                </tr>
            </table>
        </tr>
    </table>
</div>