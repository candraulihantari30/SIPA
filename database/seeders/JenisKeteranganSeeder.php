<?php

namespace Database\Seeders;

use App\Models\Keterangan;
use Illuminate\Database\Seeder;

class JenisKeteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keterangan::create([
            'id_keterangan' => '1',
            'nama_keterangan' => 'Kawin'
        ]);

        Keterangan::create([
            'id_keterangan' => '2',
            'nama_keterangan' => 'Belum Kawin'
        ]);

        Keterangan::create([
            'id_keterangan' => '3',
            'nama_keterangan' => 'Cerai Mati'
        ]);

        Keterangan::create([
            'id_keterangan' => '4',
            'nama_keterangan' => 'Cerai Hidup'
        ]);
    }
}
