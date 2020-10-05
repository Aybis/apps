<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('level', 25)->nullable();
            $table->tinyInteger('id_unit')->nullable();
            $table->string('position', 255)->nullable();
            $table->string('band', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->boolean('status')->default(1);
            $table->tinyInteger('created_by')->nullable();
            $table->tinyInteger('updated_by')->nullable();

            $table->integer('role_id');

            $table->timestamp('current_sign_in_at')->nullable();
            $table->timestamp('last_sign_in')->nullable();
            $table->timestamp('log_out')->nullable();
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
        Schema::dropIfExists('users');
    }
}
