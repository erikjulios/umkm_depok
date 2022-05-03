<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pemesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('produk_id');
            $table->integer('pesanan_id');
            $table->integer('jumlah_produk');
            //$table->integer('jumlah_harga');
            //$table->string('status');
            $table->string('nomor_order')->nullable();
            $table->timestamp('tanggal_pembelian');
            $table->string('no_resi')->nullable();
            $table->string('total_pembayaran');
            $table->text('alamat_pengiriman')->nullable();
            $table->boolean('flag_status_pesanan_menunggu_bayar')->nullable();
            $table->boolean('flag_status_pesanan_sudah_bayar')->nullable();
            $table->boolean('flag_status_pesanan_sudah_kirim')->nullable();
            $table->boolean('flag_status_pesanan_sudah_selesai')->nullable();
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
        Schema::dropIfExists('detail_pemesanans');
    }
}
