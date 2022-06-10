<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('foto_produk');
            $table->string('berat_unit', 50);
            $table->text('komposisi');
            $table->integer('produk_terjual')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('varian');
            $table->string('varian_tersedia')->nullable();
            $table->boolean('ketersediaan_produk')->nullable();
            $table->string('no_BPOM', 20)->unique();
            $table->float('rating', 2, 2)->nullable();
            $table->string('diskon')->nullable();
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
        Schema::dropIfExists('produks');
    }
}