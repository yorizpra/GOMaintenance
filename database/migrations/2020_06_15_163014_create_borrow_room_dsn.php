<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowRoomDsn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_room_dsn', function (Blueprint $table) {
            $table->increments('id_peminjaman');
            $table->integer('id_dosen')->unsigned();
            $table->foreign('id_dosen')->references('id_dosen')->on('lecturers')->onDelete('cascade');
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
        Schema::dropIfExists('borrow_room_dsn');
    }
}