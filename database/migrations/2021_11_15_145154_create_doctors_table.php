<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name')->nullable();
            $table->string('doctor_specility')->nullable();
            $table->string('orignal_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('year_experience')->nullable();
            $table->string('rating_number')->nullable();
            $table->string('language')->nullable();
            $table->string('availablity')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('message')->nullable();
            $table->string('total_rating')->nullable();
            $table->string('user_name_rating')->nullable();
            $table->text('user_comment')->nullable();
            $table->text('about_therapist')->nullable();
            $table->text('certification_detail')->nullable();
            $table->text('experience_detail')->nullable();
            $table->text('video_link1')->nullable();
            $table->text('video_link2')->nullable();
            $table->text('video_link3')->nullable();
            $table->text('video_link4')->nullable();
            $table->text('video_link5')->nullable();
            

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
        Schema::dropIfExists('doctors');
    }
}
