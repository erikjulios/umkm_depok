<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerHistoryAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
                CREATE TRIGGER tr_after_admin_insert AFTER INSERT ON `produks` FOR EACH ROW
                    BEGIN
                        INSERT INTO `history_admins`(`id`,`deskripsi`,`created_at`) VALUES (NEW.id,"Input data",NOW());
                    END
                ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_after_admin_insert');
    }
}
