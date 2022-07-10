<div class="table-responsive">
    <table class="table table-bordered border">
        <tr>
            <th>NIK</th>
            <td>{{ $urunan->krama->nik }}</td>
        </tr>
        <tr>
            <th>Nama</th>
            <td>{{ $urunan->krama->nm }}</td>
        </tr>
        <tr>
            <th>Banjar Adat</th>
            <td>{{ $urunan->krama->banjarAdat->nama_banjar_adat }}</td>
        </tr>
        <tr>
            <th>Tempekan</th>
            <td>{{ $urunan->krama->tempekan->nama_tempekan }}</td>
        </tr>
        <tr>
            <th>Status Krama</th>
            <td>{{$urunan->status->status_krama}}</td>
        </tr>
        <tr>
            <th>Jumlah Urunan</th>
            <td>{{ $urunan->jumlah_iuran }}</td>
        </tr>
        <tr>
            <th>Periode</th>
            <td>{{ $urunan->periode }}</td>
        </tr>
        <tr>
            <th>Status Pembayaran</th>
            <td>{{ $urunan->status_pembayaran }}</td>
        </tr>
        <tr>
            <th>Bukti Pembayaran</th>
            <td><img src="{{ asset('storage/'. $urunan->bukti_pembayaran) }}" alt="" width="300px"></td>
        </tr>
    </table>
    <div class="row">
        <div class="col-3">
            <a href="{{ route('Urunan.status', $urunan->id_irnw) }}?status_pembayaran=Belum+Bayar" class="btn btn-danger btn-block">
                Belum Bayar
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('Urunan.status', $urunan->id_irnw) }}?status_pembayaran=Gagal" class="btn btn-danger btn-block">
                Gagal
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('Urunan.status', $urunan->id_irnw) }}?status_pembayaran=Proses" class="btn btn-warning btn-block">
                Proses
            </a>
        </div>
        <div class="col-3">
            <a href="{{ route('Urunan.status', $urunan->id_irnw) }}?status_pembayaran=Sukses" class="btn btn-success btn-block">
                Sukses
            </a>
        </div>
    </div>

</div>