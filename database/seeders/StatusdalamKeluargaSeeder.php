<?php

namespace Database\Seeders;

use App\Models\StatusKeluarga;
use Illuminate\Database\Seeder;

class StatusdalamKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusKeluarga::create([
            'id' => '1',
            'status_dalam_keluarga' => 'Kepala Keluarga'
        ]);
        StatusKeluarga::create([
            'id' => '2',
            'status_dalam_keluarga' => 'Istri'
        ]);
        StatusKeluarga::create([
            'id' => '3',
            'status_dalam_keluarga' => 'Anak'
        ]);
        StatusKeluarga::create([
            'id' => '4',
            'status_dalam_keluarga' => 'Orang Tua'
        ]);
        StatusKeluarga::create([
            'id' => '5',
            'status_dalam_keluarga' => 'Famili Lain'
        ]);
    }
}
