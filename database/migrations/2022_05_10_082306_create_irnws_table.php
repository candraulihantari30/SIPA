<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIrnwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('irnws', function (Blueprint $table) {
            $table->id('id_irnw');
            $table->bigInteger('nik_krama')->unsigned();
            // $table->foreign('nik_krama')->references('id')->on('kramas')->onDelete('cascade');
            $table->string('status_krama');
            $table->integer('jumlah_iuran');
            $table->string('status_pembayaran');
            $table->integer('pembayaran')->nullable();
            $table->year('periode');
            $table->string('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('irnws');
    }
}
