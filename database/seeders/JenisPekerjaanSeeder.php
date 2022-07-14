<?php

namespace Database\Seeders;

use App\Models\JenisPekerjaan;
use Illuminate\Database\Seeder;

class JenisPekerjaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPekerjaan::create([
            'id_pekerjaan' => '1',
            'nama_pekerjaan' => 'Belum Bekerja'
        ]);

        JenisPekerjaan::create([
            'id_pekerjaan' => '2',
            'nama_pekerjaan' => 'Buruh'
        ]);

        JenisPekerjaan::create([
            'id_pekerjaan' => '3',
            'nama_pekerjaan' => 'Nelayan'
        ]);

        JenisPekerjaan::create([
            'id_pekerjaan' => '4',
            'nama_pekerjaan' => 'Pengusaha'
        ]);

        JenisPekerjaan::create([
            'id_pekerjaan' => '5',
            'nama_pekerjaan' => 'Pegawai Swasta'
        ]);

        JenisPekerjaan::create([
            'id_pekerjaan' => '6',
            'nama_pekerjaan' => 'Pegawai Negeri'
        ]);

        JenisPekerjaan::create([
            'id_pekerjaan' => '7',
            'nama_pekerjaan' => 'Lainnya'
        ]);
    }
}
