<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kegiatan::create([
            'nm_kgtn'   => 'Pembersihan',
            'tmpt'      => 'Singaraja',
            'tgl'       => '2018-12-28',
            'jam'       => '12.00',
            'interval'  => 'Interval',
            'peserta'   => 'Semua'
        ]);
    }
}
