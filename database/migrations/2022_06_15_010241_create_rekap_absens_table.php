<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_absens', function (Blueprint $table) {
            $table->id('id_rekap');
            $table->integer('krama_id');
            $table->integer('hadir');
            $table->integer('izin');
            $table->integer('tidak_hadir');
            $table->integer('nominal');
            $table->string('status_pembayaran');
            $table->year('periode');
            $table->string('jenis');
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
        Schema::dropIfExists('rekap_absens');
    }
}
