<?php

namespace Database\Seeders;

use App\Models\JabatanPrajuru;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class JabatanPrajuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JabatanPrajuru::create([
            'jabatan_prajuru' => "Bendesa Adat",
        ]);

        JabatanPrajuru::create([
            'jabatan_prajuru' => "Petajuh",
        ]);

        JabatanPrajuru::create([
            'jabatan_prajuru' => "Penyarikan",
        ]);

        JabatanPrajuru::create([
            'jabatan_prajuru' => "Petengen",
        ]);

        JabatanPrajuru::create([
            'jabatan_prajuru' => "Staf Administrasi",
        ]);

        JabatanPrajuru::create([
            'jabatan_prajuru' => "Kelian Tempekan",
        ]);

        JabatanPrajuru::create([
            'jabatan_prajuru' => "Kelian Banjar Adat",
        ]);
    }
}
