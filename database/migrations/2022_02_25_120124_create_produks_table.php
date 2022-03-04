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
            $table->foreignId('umkm_id');
            $table->string('nama_produk', 100);
            $table->string('slug')->unique();
            $table->string('foto_produk');
            $table->string('berat_unit', 50);
            $table->mediumInteger('harga_unit');
            $table->text('komposisi');
            $table->integer('stok_tersedia')->nullable();
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
