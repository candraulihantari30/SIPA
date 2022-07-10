<?php

namespace Database\Seeders;

use App\Models\Dadya;
use Illuminate\Database\Seeder;

class DadyaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dadya::create([
            'nm_kt' => 'Kadek Arjana',
            'nm_ddy' => '1',
            'alamat' => '1',
        ]);
        Dadya::create([
            'nm_kt' => 'Made Wijana',
            'nm_ddy' => '2',
            'alamat' => '1',
        ]);
        Dadya::create([
            'nm_kt' => 'Made Ardana',
            'nm_ddy' => '3',
            'alamat' => '1',
        ]);
        Dadya::create([
            'nm_kt' => 'Ketut Rejeng',
            'nm_ddy' => '4',
            'alamat' => '1',
        ]);
        Dadya::create([
            'nm_kt' => 'Made Gelgel',
            'nm_ddy' => '4',
            'alamat' => '1',
        ]);
    }
}
