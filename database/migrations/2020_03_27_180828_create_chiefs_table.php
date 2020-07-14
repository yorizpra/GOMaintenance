<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chiefs', function (Blueprint $table) {
            $table->increments('id_kajur');
            $table->string('nama', 50);
            $table->string('jenis_kelamin', 10);
            $table->string('no_telepon', 15);
            $table->string('alamat', 100);
            $table->string('username');
            $table->string('password');
            // $table->boolean('is_kajur')->nullable(false);
            $table->timestamps();

            // $table->increments('id_kajur');
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('password');
            // $table->boolean('is_super')->default(false);
            // $table->rememberToken();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chiefs');
    }
}
