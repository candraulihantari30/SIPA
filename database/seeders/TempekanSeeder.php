<?php

namespace Database\Seeders;

use App\Models\Tempekan;
use Illuminate\Database\Seeder;

class TempekanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Banjar Pakraman Binginbanjah
        Tempekan::create([
            'id_tempekan' => '1',
            'nama_tempekan' => 'Tempekan Celuk',
            'banjar_adat_id' => '1'
        ]);
        Tempekan::create([
            'id_tempekan' => '2',
            'nama_tempekan' => 'Tempekan Pura Cepung',
            'banjar_adat_id' => '1'
        ]);
        Tempekan::create([
            'id_tempekan' => '3',
            'nama_tempekan' => 'Tempekan Yeh Kuning',
            'banjar_adat_id' => '1'
        ]);
        Tempekan::create([
            'id_tempekan' => '4',
            'nama_tempekan' => 'Tempekan Mesigit',
            'banjar_adat_id' => '1'
        ]);

        // Banjar Pakraman Labuanaji
        Tempekan::create([
            'id_tempekan' => '5',
            'nama_tempekan' => 'Tempekan Kelod',
            'banjar_adat_id' => '2'
        ]);
        Tempekan::create([
            'id_tempekan' => '6',
            'nama_tempekan' => 'Tempekan Tengah',
            'banjar_adat_id' => '2'
        ]);
        Tempekan::create([
            'id_tempekan' => '7',
            'nama_tempekan' => 'Tempekan Kauh',
            'banjar_adat_id' => '2'
        ]);

        // Banjar Pakraman Tengah
        Tempekan::create([
            'id_tempekan' => '8',
            'nama_tempekan' => 'Tempekan Pengerangan',
            'banjar_adat_id' => '3'
        ]);
        Tempekan::create([
            'id_tempekan' => '9',
            'nama_tempekan' => 'Tempekan Tengah',
            'banjar_adat_id' => '3'
        ]);
        Tempekan::create([
            'id_tempekan' => '10',
            'nama_tempekan' => 'Tempekan Menginih',
            'banjar_adat_id' => '3'
        ]);
        Tempekan::create([
            'id_tempekan' => '11',
            'nama_tempekan' => 'Tempekan Kangin',
            'banjar_adat_id' => '3'
        ]);

        // Banjar Pakraman Pegayaman
        Tempekan::create([
            'id_tempekan' => '12',
            'nama_tempekan' => 'Tempekan Berawah',
            'banjar_adat_id' => '4'
        ]);
        Tempekan::create([
            'id_tempekan' => '13',
            'nama_tempekan' => 'Tempekan Lengkeng',
            'banjar_adat_id' => '4'
        ]);
        Tempekan::create([
            'id_tempekan' => '14',
            'nama_tempekan' => 'Tempekan Pura Batulas',
            'banjar_adat_id' => '4'
        ]);
    }
}
