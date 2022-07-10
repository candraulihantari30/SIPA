<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKelamin::create([
            'id' => '1',
            'jenis_kelamin' => 'Laki - Laki'
        ]);
        JenisKelamin::create([
            'id' => '2',
            'jenis_kelamin' => 'Perempuan'
        ]);
    }
}
