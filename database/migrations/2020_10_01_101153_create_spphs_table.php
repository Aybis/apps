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
            $table->date('tanggal_sph')->nullable();
            $table->time('time_sph')->nullable();
            $table->longText('judul');
            $table->string('pic')->nullable();
            $table->string('dari')->nullable();
            $table->string('tembusan')->nullable();
            $table->unsignedSmallInteger('mitra_id')->nullable();
            $table->enum('status', ['draft','save','done']);
            $table->unsignedSmallInteger('created_by');
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
