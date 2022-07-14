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
            'nik'           => '5108040801770003',
            'level'         => 'krama',
            'no_kk'         => '5108041612090011',
            'nm'            => 'Nyoman Suardika',
            'tmpt'          => 'Temukus',
            'tgl'           => '1977-01-08',
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
            'password'      => bcrypt('Nyoman'),
        ]);

        Krama::create([
            'nik'           => '5108046212770001',
            'level'         => 'krama',
            'no_kk'         => '5108041612090011',
            'nm'            => 'Luh Suhartini',
            'tmpt'          => 'Bubunan',
            'tgl'           => '1977-12-22',
            'stts_dlm_klrg' => '2',
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

        PrajuruAdat::create([
            'nik'           => '5308061301010002',
            'level'         => 'prajuru',
            'nama_pegawai'  => 'Kadek Candra Ulihantari',
            'jk'            => '1',
            'jabatan'       => '5',
            'banjar_adat'   => '1',
            'tempekan_id'   => '1',
            'tempat'        => 'Singaraja',
            'tangal_lahir'  => '2022-05-06',
            'password'      => bcrypt('Candra'),
        ]);
    }
}
