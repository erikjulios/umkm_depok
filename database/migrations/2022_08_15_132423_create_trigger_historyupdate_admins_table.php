<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriggerHistoryupdateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::unprepared('
                CREATE TRIGGER tr_after_admin_update AFTER UPDATE ON `produks` FOR EACH ROW
                    BEGIN
                        INSERT INTO `history_admins`(`deskripsi`,`created_at`) VALUES ("Update data",NOW());
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
        Schema::dropIfExists('trigger_historyupdate_admins');
    }
}
