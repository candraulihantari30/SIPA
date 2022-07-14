<?php

namespace Database\Seeders;

use App\Models\Dedosan;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusKramaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'id' => '1',
            'status_krama' => 'Negak',
            'urunan' => 20000,
            'jenis' => 'urunan'
        ]);
        Status::create([
            'id' => '2',
            'status_krama' => 'Ngampel',
            'urunan' => 30000,
            'jenis' => 'urunan'
        ]);
        Status::create([
            'id' => '3',
            'status_krama' => 'Nyada',
            'urunan' => 0,
            'jenis' => 'urunan'
        ]);
        Status::create([
            'id' => '4',
            'status_krama' => 'Yowana',
            'urunan' => 0,
            'jenis' => 'urunan'
        ]);

        Dedosan::create([
            'nominal_dedosan'   => 25000,
        ]);
    }
}
