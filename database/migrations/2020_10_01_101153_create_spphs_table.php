<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spphs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_spph');
            $table->date('tanggal_spph');
            $table->string('nomor_sph')->nullable();
            $table->dateTime('tanggal_sph')->nullable();
            $table->unsignedSmallInteger('mitra_id')->nullable();
            $table->string('penanggung_jawab')->nullable();
            $table->longText('judul');
            $table->longText('isi');
            $table->enum('status', ['draft','save','done']);
            $table->unsignedSmallInteger('created_by');

            //File And Lampiran
            $table->longText('title_lampiran')->nullable();
            $table->longText('path_lampiran')->nullable();
            $table->dateTime('date_lampiran')->nullable();
            $table->longText('title_file')->nullable();
            $table->longText('path_file')->nullable();
            $table->dateTime('date_file')->nullable();
            
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
        Schema::dropIfExists('spphs');
    }
}
