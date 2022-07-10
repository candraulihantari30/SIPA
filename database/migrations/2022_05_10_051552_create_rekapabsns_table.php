<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapabsnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekapabsns', function (Blueprint $table) {
            $table->char('nik');
            $table->string('nama');
            $table->string('jmlh_h');
            $table->string('jmlh_th');
            $table->string('hari', 10);
            $table->string('tgl', 5);
            $table->string('bln', 20);
            $table->string('thn', 8);
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
        Schema::dropIfExists('rekapabsns');
    }
}
