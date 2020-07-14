<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowRoomKjr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_room_kjr', function (Blueprint $table) {
            $table->increments('id_peminjaman');
            $table->integer('id_kajur')->unsigned();
            $table->foreign('id_kajur')->references('id_kajur')->on('chiefs')->onDelete('cascade');
            $table->integer('id_ruangan')->unsigned();
            $table->foreign('id_ruangan')->references('id_ruangan')->on('rooms')->onDelete('cascade');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->enum('status', ['pinjam', 'kembali']);
            $table->text('ket')->nullable();
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
        Schema::dropIfExists('borrow_room_kjr');
    }
}