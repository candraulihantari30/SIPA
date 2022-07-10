<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrajuruAdatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prajuru_adats', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('level', 20)->nullable();
            $table->string('nama_pegawai');
            $table->char('jk', 1);
            $table->string('jabatan');
            $table->string('banjar_adat');
            $table->string('tempekan_id');
            $table->string('tempat');
            $table->date('tangal_lahir');
            $table->string('foto')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('prajuru_adats');
    }
}
