<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomParams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slot_times', function (Blueprint $table) {
            $table->string('time')->nullable();
            $table->string('days')->nullable();
            $table->string('duration')->nullable();
            $table->string('amount')->nullable();
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
            $table->dropColumn('time');
            $table->dropColumn('days');
            $table->dropColumn('duration');
            $table->dropColumn('amount');
        });
    }
}
