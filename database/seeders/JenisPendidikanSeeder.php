<?php

namespace Database\Seeders;

use App\Models\JenisPendidikan;
use Illuminate\Database\Seeder;

class JenisPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisPendidikan::create([
            'id_pendidikan' => '1',
            'nama_pendidikan' => 'SD/Sederajat'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '2',
            'nama_pendidikan' => 'SMP/Sederajat'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '3',
            'nama_pendidikan' => 'SMA/Sederajat'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '4',
            'nama_pendidikan' => 'D1'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '5',
            'nama_pendidikan' => 'D2'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '6',
            'nama_pendidikan' => 'D3'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '7',
            'nama_pendidikan' => 'D4'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '8',
            'nama_pendidikan' => 'S1'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '9',
            'nama_pendidikan' => 'S2'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '10',
            'nama_pendidikan' => 'S3'
        ]);

        JenisPendidikan::create([
            'id_pendidikan' => '11',
            'nama_pendidikan' => 'Lainnya...'
        ]);
    }
}
