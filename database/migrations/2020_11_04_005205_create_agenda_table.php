<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal'); 
            $table->unsignedBigInteger('jam_id')->references('id')->on('jam')->onUpdate('cascade');
            $table->unsignedBigInteger('kelas_id')->references('id')->on('kelas')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->unsignedBigInteger('kelas_tingkat_id')->references('id')->on('kelas_tingkat')->onUpdate('cascade');
            $table->unsignedBigInteger('mapel_id')->references('id')->on('mapel')->onUpdate('cascade');
            $table->unsignedBigInteger('kompetensi_id')->references('id')->on('kompetensi')->onUpdate('cascade')->nullable();
            $table->string('tugas')->nullable();
            $table->string('evaluasi')->nullable();
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('agenda');
    }
}

