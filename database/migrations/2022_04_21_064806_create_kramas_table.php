<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kramas', function (Blueprint $table) {
            $table->id();
            $table->char('nik', 16);
            $table->string('level', 20)->nullable();
            $table->char('no_kk', 16)->nullable();
            $table->string('nm', 100)->nullable();
            $table->string('tmpt', 20)->nullable();
            $table->date('tgl')->nullable();
            $table->string('stts_dlm_klrg', 1)->nullable();
            $table->string('jbt', 1)->nullable();
            $table->char('bnjr_adt', 1);
            $table->char('tmpkn', 2);
            $table->string('stts', 1)->nullable();
            $table->string('pndd', 30)->nullable();
            $table->string('pkrjn', 50)->nullable();
            $table->string('jk', 1)->nullable();
            $table->string('ktrgn', 1)->nullable();
            $table->string('ft')->nullable();
            $table->string('nm_ddy', 2)->nullable();
            $table->string('nm_kt_ddy', 2)->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('kramas');
    }
}
