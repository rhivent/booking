<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE TRIGGER sales_ticket AFTER UPDATE ON `transactions` FOR EACH ROW
            BEGIN
                IF NEW.status_ticket > 0 THEN
                    UPDATE tickets SET total_ticket=total_ticket - NEW.qty WHERE id=NEW.id_ticket;
                END IF;
            END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `sales_ticket`');
    }
}
