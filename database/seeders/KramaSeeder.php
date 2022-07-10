<?php

namespace Database\Seeders;

use App\Models\Irnw;
use App\Models\Krama;
use App\Models\PrajuruAdat;
use Illuminate\Database\Seeder;

class KramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Krama
        Krama::create([
            'nik'           => '5108061301010001',
            'level'         => 'krama',
            'no_kk'         => '5208061301010001',
            'nm'            => 'rizky',
            'tmpt'          => 'temukus',
            'tgl'           => '2022-05-06',
            'stts_dlm_klrg' => '1',
            'jbt'           => '1',
            'bnjr_adt'      => '2',
            'tmpkn'         => '3',
            'stts'          => '1',
            'pndd'          => '6',
            'pkrjn'         => '2',
            'jk'            => '1',
            'ktrgn'         => '1',
            'nm_ddy'        => '1',
            'nm_kt_ddy'     => '2',
            'password'      => bcrypt('Indrawan'),
        ]);

        Krama::create([
            'nik'           => '5108061301010010',
            'level'         => 'krama',
            'no_kk'         => '5208061301010002',
            'nm'            => 'Surating Raditya Wibawa',
            'tmpt'          => 'singaraja',
            'tgl'           => '2022-05-06',
            'stts_dlm_klrg' => '1',
            'jbt'           => '1',
            'bnjr_adt'      => '2',
            'tmpkn'         => '3',
            'stts'          => '2',
            'pndd'          => '6',
            'pkrjn'         => '2',
            'jk'            => '1',
            'ktrgn'         => '1',
            'nm_ddy'        => '1',
            'nm_kt_ddy'     => '2',
            'password'      => bcrypt('Indrawan'),
        ]);

        Irnw::create([
            'nik_krama'     => '1',
            'status_krama'  => '1',
            'jumlah_iuran'  => '20000',
            'status_pembayaran' => 'Belum Bayar',
            'periode'       => '2022',
            'jenis'         => 'urunan',
        ]);

        Irnw::create([
            'nik_krama'     => '2',
            'status_krama'  => '2',
            'jumlah_iuran'  => '30000',
            'status_pembayaran' => 'Belum Bayar',
            'periode'       => '2022',
            'jenis'         => 'urunan',
        ]);

        Krama::create([
            'nik'           => '5108061301010002',
            'no_kk'         => '5208061301010001',
            'nm'            => 'Kadek Candra Ulihantari',
            'tmpt'          => 'temukus',
            'tgl'           => '2022-05-06',
            'stts_dlm_klrg' => '2',
            'jbt'           => '1',
            'bnjr_adt'      => '2',
            'tmpkn'         => '3',
            'stts'          => '2',
            'pndd'          => '6',
            'pkrjn'         => '4',
            'jk'            => '1',
            'ktrgn'         => '1',
            'nm_ddy'        => '1',
            'nm_kt_ddy'     => '2',
            'password'      => bcrypt('cantik01'),
        ]);

        PrajuruAdat::create([
            'nik'           => '5308061301010002',
            'level'         => 'prajuru',
            'nama_pegawai'  => 'Made Angga Wahyu Darsana',
            'jk'            => '1',
            'jabatan'       => '5',
            'banjar_adat'   => '1',
            'tempekan_id'   => '1',
            'tempat'        => 'Singaraja',
            'tangal_lahir'  => '2022-05-06',
            'password'      => bcrypt('Indrawan123'),
        ]);
    }
}
