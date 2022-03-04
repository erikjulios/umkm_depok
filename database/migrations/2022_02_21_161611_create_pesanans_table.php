<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            //format db dari kak erik
            $table->id();
            $table->integer('user_id');
            $table->date('tanggal');
            $table->string('status');
            $table->integer('jumlah_harga');
            $table->timestamps();

            //format dari bu elin
            // $table->id();
            // $table->integer('user_id');
            // $table->string('status');
            // $table->string('nomor_order');
            // $table->timestamp('tanggal_pembelian');
            // $table->string('status_transaksi');
            // $table->string('nomor_pemesanan');
            // $table->string('no_resi');
            // $table->string('total_pembayaran');
            // $table->text('alamat_pengiriman');
            // $table->boolean('flag_status_pesanan_menunggu_bayar');
            // $table->boolean('flag_status_pesanan_sudah_bayar');
            // $table->boolean('flag_status_pesanan_sudah_kirim');
            // $table->boolean('flag_status_pesanan_sudah_selesai');
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
        Schema::dropIfExists('pesanans');
    }
};
