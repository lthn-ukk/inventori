<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailPinjam', function (Blueprint $table) {
            $table->increments('id_detailPinjam');
            $table->integer('id_inventaris')->unsigned()->index();
            $table->integer('jumlah');
            $table->integer('id_peminjaman');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detailPinjam');
    }
}
