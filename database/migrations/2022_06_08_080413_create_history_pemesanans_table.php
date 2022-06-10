<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pesanan_id');
            $table->bigInteger('user_id');
            $table->bigInteger('produk_id');
            $table->integer('jumlah_produk');
            $table->timestamp('tanggal_pembelian');
            $table->string('jasa_kirim');
            $table->string('total_pembayaran');
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
        Schema::dropIfExists('history_pemesanans');
    }
}
