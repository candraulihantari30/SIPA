<?php

namespace Database\Seeders;

use App\Models\BanjarAdat;
use Illuminate\Database\Seeder;

class BanjarAdatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BanjarAdat::create([
            'id_banjar_adat' => '1',
            'nama_banjar_adat' => 'Banjar Pakraman Binginbanjah'
        ]);
        BanjarAdat::create([
            'id_banjar_adat' => '2',
            'nama_banjar_adat' => 'Banjar Pakraman Labuhan Aji'
        ]);
        BanjarAdat::create([
            'id_banjar_adat' => '3',
            'nama_banjar_adat' => 'Banjar Pakraman Tengah'
        ]);
        BanjarAdat::create([
            'id_banjar_adat' => '4',
            'nama_banjar_adat' => 'Banjar Pakraman Pegayaman'
        ]);
    }
}
