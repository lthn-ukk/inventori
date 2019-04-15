<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventarisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->increments('id_inventaris');
            $table->string('nama', 20);
            $table->string('kondisi', 10);
            $table->text('keterangan')->nullable();
            $table->integer('jumlah');
            $table->integer('id_jenis')->unsigned()->index();
            $table->date('tanggal_register');
            $table->integer('id_ruang')->unsigned()->index();
            $table->string('kode_inventaris', 5);
            $table->integer('id_users')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventaris');
    }
}
