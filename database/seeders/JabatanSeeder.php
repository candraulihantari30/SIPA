<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'id' => '1',
            'jabatan' => 'Krama'
        ]);
        Jabatan::create([
            'id' => '2',
            'jabatan' => 'Pecalang'
        ]);
        Jabatan::create([
            'id' => '3',
            'jabatan' => 'Linmas'
        ]);
        Jabatan::create([
            'id' => '4',
            'jabatan' => 'Mangku Dadia'
        ]);
        Jabatan::create([
            'id' => '5',
            'jabatan' => 'Mangku Desa'
        ]);
        Jabatan::create([
            'id' => '6',
            'jabatan' => 'Juru Arah'
        ]);
        Jabatan::create([
            'id' => '7',
            'jabatan' => 'Ketua Tempekan'
        ]);
        Jabatan::create([
            'id' => '8',
            'jabatan' => 'Prajuru Desa Adat'
        ]);
        Jabatan::create([
            'id' => '9',
            'jabatan' => 'Prajuru Desa Dinas'
        ]);
    }
}
