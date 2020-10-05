<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileSpphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_spphs', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('spph_id');
            $table->text('path')->nullable();
            $table->text('title')->nullable();
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
        Schema::dropIfExists('file_spphs');
    }
}
