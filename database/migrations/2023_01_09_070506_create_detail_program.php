<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_program', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('program_kegiatan_id');
            $table->foreign('program_kegiatan_id')->references('id')->on('program_kegiatan');
            $table->string('nama_kegiatan');
            $table->date('tanggal');
            $table->string('pengeluaran');
            $table->string('bukti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_program');
    }
};
