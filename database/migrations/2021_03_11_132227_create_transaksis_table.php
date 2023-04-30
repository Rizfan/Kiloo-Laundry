<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_invoice',100);
            $table->bigInteger('id_outlet');
            $table->bigInteger('id_paket');
            $table->bigInteger('id_member');
            $table->double('jumlah');
            $table->bigInteger('harga');
            $table->bigInteger('discount');
            $table->bigInteger('pajak');
            $table->dateTime('tanggal_masuk');
            $table->dateTime('batas_waktu');

            $table->bigInteger('id_user');

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
        Schema::dropIfExists('transaksis');
    }
}
