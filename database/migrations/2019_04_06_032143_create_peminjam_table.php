<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeminjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjam', function (Blueprint $table) {
            $table->increments('id_peminjam');
            $table->string('nama_peminjam', 30);
            $table->text('alamat');
            $table->integer('id_users')->unsigned()->index();
        });

        // Relasi tabel

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_level')->references('id_level')->on('level')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('inventaris', function (Blueprint $table) {
            $table->foreign('id_ruang')->references('id_ruang')->on('ruang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('operator', function (Blueprint $table) {
           $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });

        Schema::table('peminjam', function (Blueprint $table) {
           $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
        });

        Schema::table('peminjaman', function (Blueprint $table) {
           $table->foreign('id_operator')->references('id_operator')->on('operator')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_peminjam')->references('id_peminjam')->on('peminjam')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_detailPinjam')->references('id_detailPinjam')->on('detailPinjam')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::drop('peminjam');
    }
}
