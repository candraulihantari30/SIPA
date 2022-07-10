<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            KramaSeeder::class,
            JenisKelaminSeeder::class,
            StatusdalamKeluargaSeeder::class,
            JabatanSeeder::class,
            StatusKramaSeeder::class,
            BanjarAdatSeeder::class,
            TempekanSeeder::class,
            NamaddySeeder::class,
            JenisPendidikanSeeder::class,
            JenisPekerjaanSeeder::class,
            JenisKeteranganSeeder::class,
            JabatanPrajuruSeeder::class,
            DadyaSeeder::class,
            JadwalSeeder::class,
        ]);
    }
}
