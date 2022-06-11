<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
<<<<<<< HEAD
            $table->string('nohp')->unique()->nullable();
            $table->string('alamat')->nullable();
            // $table->string('rekening_pembayaran')->nullable();
            // $table->string('username')->unique()->nullable();
=======
            $table->string('no_hp')->unique()->nullable();
            $table->string('username')->unique()->nullable();
>>>>>>> d69de96a46a4894b104237985f664b382e6f2418
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
