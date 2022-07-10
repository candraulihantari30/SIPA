<table width="100%">
    <tr>
        <th>Rencana Kegiatan</th>
        <td>:</td>
        <td>{{ $jadwal->nm_kgtn }}</td>
    </tr>
    <tr>
        <th>Tempat Kegiatan</th>
        <td>:</td>
        <td>{{ $jadwal->tmpt }}</td>
    </tr>
    <tr>
        <th>Peserta</th>
        <td>:</td>
        <td>{{ $jadwal->peserta }}</td>
    </tr>
    <tr>
        <th>Interval</th>
        <td>:</td>
        <td>{{ $jadwal->interval }}</td>
    </tr>
    <tr>
        <th>Tanggal Kegiatan</th>
        <td>:</td>
        <td>{{ \Carbon\Carbon::parse($jadwal->tgl)->isoFormat('dddd, D MMMM Y') }}</td>
    </tr>
    <tr>
        <th>Waktu Kegiatan</th>
        <td>:</td>
        <td>{{ $jadwal->jam }}</td>
    </tr>
</table>