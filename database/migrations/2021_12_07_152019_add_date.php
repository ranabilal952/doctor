<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slot_times', function (Blueprint $table) {
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
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
            $table->dropColumn('date_from');
            $table->dropColumn('date_to');
        });
    }
}
