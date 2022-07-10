<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensis', function (Blueprint $table) {
            $table->bigIncrements('id_presensi');
            $table->foreignId('krama_id');
            $table->foreignId('id_kegiatan')->nullable();
            $table->date('tgl_absen')->nullable();
            $table->enum('kehadiran', ['hadir', 'izin', 'alpa']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensis');
    }
}
