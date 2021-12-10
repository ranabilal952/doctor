<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsBooked extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slot_times', function (Blueprint $table) {
            $table->boolean('booking_status')->default(1)->comment('1 for active, 0 for booked, 2 for canceled');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('slot_times', function (Blueprint $table) {
            $table->dropColumn('booking_status');
        });
    }
}
